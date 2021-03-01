<?php //Where the random distribution takes place
include "access.php";
include "database.php";
include "security.php";
error_reporting(E_ALL);
ini_set('display_errors',1);
$name = h($_POST['chore']);
$description = h($_POST['description']);
$frequency = h($_POST['frequency']);
$difficulty = h($_POST['difficulty']);

$db = new Database();
$data = [];
$data = array(); //An associative array of the weightings of the chores on each user
$minWeight = 10000000; //The least weight in the list
$minID; //The associated ID with the least weight
$users = $db->query("SELECT * FROM USERS");
while($users_id = $users->fetchArray()){ //Obtains users from database in array
    $weight = 0; //The weight of the amount of tasks already given
    $items = $db->query("SELECT * FROM CHORES WHERE USER_ID = ".$users_id['ID']); //obtains items for specific user
    while($items_rows = $items->fetchArray()){ //Goes through each item
        switch($items_rows['FREQUENCY']){ //Checks the frequency using case statement
            case "Every Day":
                $weight = $weight + 4; //Adds a weight of 4 for everyday
                break;
            case "Every Week":
                $weight = $weight + 3; //Adds a weight of 3 for every week
                break;
            case "Every Fortnight":
                $weight = $weight + 2; //Adds a weight of 2 for every fortnight
                break;
            case "One Time":
                $weight = $weight + 1; //Adds a weight of 1 for one time
                break;
        }
        $weight *= intval($items_rows['DIFFICULTY']); //Multiplies by the difficulty of the task
    }
    $data[] = array($users_id['ID'] => $weight);
    if($weight < $minWeight){
        $minWeight = $weight;
        $minID = $users_id['ID'];
    }
}
// print_r(array_values($data)); 
// echo "<br>";
// echo "The min weight is: ".$minWeight." and it's associated ID is ".$minID;
$db->exec("INSERT INTO CHORES VALUES (NULL,'$minID','$name','$description','$frequency', '$difficulty');");
$val = $db->querySingle ("SELECT * FROM USERS WHERE ID = ".$minID);
echo "The chore has been given to: ".$val['NAME'];
?>
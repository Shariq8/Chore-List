<?php
    class Username{
        private $name;
        function name(){
            return $this->name;
        }

        function __construct($id){
            $db = new Database();
            $user = $db->querySingle("SELECT * FROM users where id = ".$id);
            $this->name = $user['NAME'];
        }
    }
?>
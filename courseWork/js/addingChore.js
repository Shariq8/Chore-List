$(document).ready( function(){
    $('.choreAdd').submit( function(){
        $('#x').empty();
        chore = document.getElementById("chore").value;
        description = document.getElementById("description").value;
        frequency = document.getElementById("frequency").value;
        difficulty = $("input[type='radio'][name='difficulty']:checked").val();
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                $('#x').append("<p style = 'position: relative; top: -180px; text-align:center' id='container' class ='text col-7'>The chore has been given to:" + this.responseText + "</p>");
            }
        }
        xmlHttp.open('post', "../courseWork/addChore.php", true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("frequency="+frequency+"&difficulty="+difficulty+"&chore="+chore+"&description="+description);
        // xmlHttp.send("frequency="+frequency+"&chore="+chore+"&description="+description);
        return false;
    })
})
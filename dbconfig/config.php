<?php 

    $con = mysqli_connect("localhost","root","","logix");

    if($con){
        echo "Connection build";
        
    }
    else{
        echo "Error in connection ";
    }

?>
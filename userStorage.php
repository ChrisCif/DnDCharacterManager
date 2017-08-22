<?php

$connection = mysqli_connect("localhost", "root", "", "dndcmdatabase");

if(isset($_POST["username"])  &&  isset($_POST["password"])){
    if($_POST["username"] != ""  &&  $_POST["password"] != ""){


        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $Query = "INSERT INTO users (`username`, `password`) VALUES ('$username', '$password')";
        $result = $connection -> query($Query);

        if($result)
            echo "stored";
        else
            echo "failed";

    }
    else{
        echo "blank";
    }
}
else{
    echo "not set";
}

$connection -> close();


?>
<?php


$connection = mysqli_connect("localhost", "root", "", "dndcmdatabase");

if(isset($_POST["user"])  &&  isset($_POST["name"])  &&  isset($_POST["race"])  &&  isset($_POST["clss"])  &&  isset($_POST["level"])  &&  isset($_POST["img"])){


    $user = $_POST["user"];
    $name = $_POST["name"];
    $race = $_POST["race"];
    $class = $_POST["clss"];
    //$level = intval($_POST["level"]);
    $level = $_POST["level"];
    $img = $_POST["img"];

    $Query = "INSERT INTO characters (`user`, `name`, `class`, `level`, `image`) VALUES ('$user', '$name', '$race', '$class', '$level', '$img')";
    $result = $connection -> query($Query);

    if($result)
        echo "stored";
    else
        echo "failed to store";


}
else
    echo "not set";


$connection -> close();


?>
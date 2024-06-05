<?php
session_start();

if(isset($_GET["img_URL"])){

    $username = $_SESSION['username'];
    $prodotto = $_GET["img_URL"];

    $dataBaseConnection = mysqli_connect("localhost", "root", "", "mhw4");

    $prodotto = mysqli_real_escape_string($dataBaseConnection, $prodotto);

    $query = "DELETE FROM CARRELLO
              WHERE img_URL = '$prodotto' AND username = '$username' LIMIT 1";

    mysqli_query($dataBaseConnection, $query);

    mysqli_close($dataBaseConnection);

    echo "eccoci???";
}

?>
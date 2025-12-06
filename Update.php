<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>

<style>
    body {
        background-color: wheat;
    }

    #form {
        background-color: wheat;

        padding: 200px;




    }

    #form>input {
        color: black;

        font-size: larger;

        background-color: white;

        border: 2px saddlebrown solid;

        border-radius: 5px;


    }

    #form>label {
        color: black;

        font-weight: bold;


    }

    #form>button {
        color: wheat;

        background-color: black;

        padding: 5px;

        border-radius: 5px;
    }

    #form>button:hover {
        color: black;

        transition: all ease-in-out 400ms;

        background-color: wheat;

        padding: 5px;

        border-radius: 5px;

        transform: scale(1.2);

        transition: all ease-in-out 400ms;

        font-weight: bold;
    }

    #form>button:active {
        background: white;
        color: black;

        font-weight: bold;



        transition: all ease-in-out 400ms;
    }
</style>


<body>
    <form action="Update.php" method="get" id="form">


        <?php
        require_once("Functions.php");
        $db = new DB();

        $ID = $_GET['id'] ?? '';

        $Users = $db->Read();

        foreach ($Users as $user) {
            if ($user->ID == $ID) {
                $user;
                break;
            }
        }
        ?>

        <label>ID:</label>

        <input type="text" name="ID" value="<?= $user->ID ?>">

        <hr>

        <label>Name:</label>

        <input type="text" name="name" value="<?= $user->name ?>">

        <hr>


        <label>Username:</label>

        <input type="text" name="username" value="<?= $user->Username ?>">

        <hr>

        <label>Mobile:</label>

        <input type="text" name="mobile" maxlength="12" value="<?= $user->Mobile ?>">



        <hr>

        <button type="submit" name="isverfiy" value="yes">UPDATE</button>

        <hr>

    </form>
</body>

</html>

<?php

require_once("Functions.php");

$db = new DB();


if (
    isset($_GET['isverfiy']) &&

    $_GET['isverfiy'] = 'yes'
) {

    $db = new DB();
    $db->Update($_GET['ID'], $_GET['name'], $_GET['username'], $_GET['mobile']);

    header("Location:Read.php");
    exit();
}







?>
<?php

require_once("Functions.php");

$db = new DB();
if (isset($_GET['delete_user']) && !empty($_GET['delete_user'])) {
    $ID = $_GET['delete_user'];
    $db->Delete($ID);
    header("Location: Read.php");
    exit;
}







if (isset($_GET['create_new_user']) && $_GET['create_new_user'] == "send") {
    header("Location: Sabtename.php");
    exit;
}



if (
    isset($_GET['send']) && $_GET['send'] == "yes"

) {
    header("Location: Update.php");
}



?>



<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users Info</title>
</head>

<style>
    table {

        background-color: rgba(236, 146, 35, 1);

        color: rgba(0, 0, 0, 1);

        margin-left: 50px;

        font-weight: bold;

    }

    button {

        border-radius: 20px;

        background-color: rgba(255, 162, 0, 0.85);

        color: rgba(0, 0, 0, 1);

        padding: 6px;


    }

    td {

        background-color: rgba(248, 170, 36, 0.85);

        border-radius: 5px;

        padding: 10px;

        font-size: larger;
    }



    td:hover {

        background-color: rgba(255, 255, 255, 1);

        font-size: larger;

        color: black;

        border-radius: 5px;

        padding: 6px;

        transform: scale(1.1);

        transition: all ease-in 390ms;
    }



    #C {
        background-color: rgba(210, 126, 0, 0.85);

        border-radius: 8px;

        padding: 6px;

        margin-bottom: 40px;

        margin-top: 10px;

        margin-left: 50px;

        font-weight: bold;
    }

    #C:hover {

        transform: scale(1.1);

        transition: all ease-in 390ms;

        background-color: rgba(0, 0, 0, 0.85);

        color: rgba(255, 255, 255, 0.85);

        border-radius: 8px;

        font-size: large;

        padding: 6px;

        margin-bottom: 40px;

        margin-top: 10px;

        margin-left: 30px;
    }
</style>


<body>
    <form method="get">


        <?php
        require_once("Functions.php");

        $db = new DB();
        $Users = $db->Read();
        ?>

        <table border="1" class="tb">
            <th colspan="6">Users_information</th>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Mobile</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>

            <?php foreach ($Users as $user): ?>
                <tr>
                    <td style="font-weight: bold;"><?php echo $user->ID; ?></td>
                    <td style="font-weight: bold;"><?php echo $user->name; ?></td>
                    <td style="font-weight: bold;"><?php echo $user->Username; ?></td>
                    <td style="font-weight: bold;"><?php echo $user->Mobile; ?></td>
                    <td style="font-weight: bold;">
                        <button type="submit" name="delete_user" value="<?php echo $user->ID; ?>">Delete</button>



                    </td>
                    <td>

                        <button name="send" value="yes"><a name="edit_user" value="Go"
                                href=" /CRUD/Update.php?id=<?= $user->ID ?>" style="text-decoration:none">Edit</a>
                        </button>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- END ONE TABLE -->



        <hr>


        <button type="submit" name="create_new_user" value="send" id="C">Create a new User</button>




    </form>
</body>

</html>
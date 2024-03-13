<?php

include "config.php";

if (isset($_GET['userID'])) {

    $user_id = $_GET['userID'];

    $sql = "DELETE FROM signup_details WHERE userID ='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record deleted successfully.";
        header('Location: view.php');
    } else {
        echo "Record deleted unsuccessfully.";
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

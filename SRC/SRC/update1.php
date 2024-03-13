<?php
session_start();
include("config.php");

if (isset($_POST['update'])) {
    $fristname = $_POST['fristname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
    $mnumber = $_POST['mnumber'];
    $user_id = $_POST['user_id'];

    $sql = "UPDATE signup_details SET fristname ='$fristname', lastname = '$lastname', 
        gender = '$gender', password = '$password', repassword = '$repassword',email = '$email', 
        mnumber = '$mnumber' WHERE userID = '$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record update suceesfully!";
        header('Location: view.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['userID'])) {
    $user_id = $_GET['userID'];
    $sql = "SELECT * FROM signup_details WHERE userID = '$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $fristname = $row['fristname'];
            $lastname = $row['lastname'];
            $gender = $row['gender'];
            $password = $row['password'];
            $repassword = $row['repassword'];
            $email = $row['email'];
            $mnumber = $row['mnumber'];
            $userID = $row['userID'];
        }

?>

        <!DOCTYPE html>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style/admin1.css">
            <title>Update contestant</title>

        </head>

        <body>
            <h2>Update register details</h2>
            <div class="container">
                <form action="update1.php" method="post">
                    <input type="hidden" name="user_id" class="user_id" value="<?php echo $userID; ?>">
                    <div class="row">
                        <div class="col-25">
                            <label for="F_Name">First Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fristname" name="fristname" value="<?php echo $fristname; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="L_Name">Last Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                        </div>
                    </div>
                    <div class="row">
                    
                        
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Gender">Gender</label>
                        </div>
                        <div class="col-75">
                            <label for="fname">Male</label>
                            <input type="radio" name="gender" value="Male" <?php if ($gender == 'male') {
                                                                                echo "checked";
                                                                            } ?>>
                            <label for="fname">Female</label>
                            <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') {
                                                                                    echo "checked";
                                                                                } ?>>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-75">
                            <input type="Password" id="password" name="password" value="<?php echo $password; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="City">repassword</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="repassword" name="repassword" value="<?php echo $repassword; ?>">
                        </div>
                    </div>
                    <div class="row">
    
                    </div>
                    <div class="row">
                
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Contact_No">Contact NO</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="mnumber" name="mnumber" value="<?php echo $mnumber; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="update" class="contestant" value="update">

                    </div>
                    <br>

                </form>
            </div>
        </body>

        </html>
<?php

    } else {
        header('Location: contestantview.php');
    }
}
?>
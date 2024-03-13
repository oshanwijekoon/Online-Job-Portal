<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name1 = $_POST['fname'];
    $Name2 = $_POST['lname'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Password2 = $_POST['repassword'];
    $Gender = $_POST['Gender'];
    $MNumber = $_POST['mnumber'];


    $sql = "INSERT INTO signup_details (fristname,lastname,email,password,repassword,gender,mnumber) 
    VALUES ('$Name1','$Name2','$Email','$Password','$Password2','$Gender','$MNumber')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        header('Location: Log In.html');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $ID = $_GET['id'];

    // Prepare the delete query
    $delete = "DELETE FROM signup_details WHERE userID = '$ID';";

    // Execute the delete query
    if ($conn ->query($delete)) {
        ?>
        <script>
             window.alert("delete Successfully");
             window.location.href ="#";
        </script>
        <?php
        exit(0);
        } else 
        {
            ?>
        <script>
            window.alert("job not delete Successfully");
            window.location.href ="#";
        </script>
        <?php
            exit(0);    
        }

}
$conn->close();
?>


mysqli_close($conn);
 
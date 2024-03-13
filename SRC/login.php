
<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM signup_details WHERE email='$Email' AND password='$Password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "Login successful!";
        header('Location: index.html');
    } else {
        echo "Invalid username or password.";
    }
}

mysqli_close($conn);
?>

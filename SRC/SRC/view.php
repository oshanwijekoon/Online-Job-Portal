<?php
include("config.php");
$sql = "SELECT * FROM signup_details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin1.css">
    <title>View contestant</title>
</head>

<body>
    <h1>register user details</h1></br>
    <table>
        <tr>
            <thead>
                <tr>
                    <th>userID</th>
                    <th>fristname</th>
                    <th>lastname</th>
                    
                    <th>Gender</th>
                   
                    <th>Password</th>
                    <th>rePassword</th>
                    <th>email</th>
                    <th>mnumber</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['userID']; ?></td>
                            <td><?php echo $row['fristname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['repassword']; ?></td>

                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mnumber']; ?></td>
                            <td><a href="update1.php?userID=<?php echo $row['userID']; ?>">update</a></td>
                            <td><a href="delete1.php?userID=<?php echo $row['userID']; ?>">delete</a></td>

                        </tr>
                <?php        }
                }

                ?>
            </tbody>
        </tr>
    </table>
    <br>

    

</body>

</html>
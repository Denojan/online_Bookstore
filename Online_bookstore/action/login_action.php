<?php

if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("location: ./login.php?error=Fields Empty" . $password);
        exit();
    } else {
        // Include Database Connection
        include '../Inc/connection.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `onlinebookstore` WHERE `Username`='{$_POST['username']}' LIMIT 1";
        $sql_result = mysqli_query($connection, $sql);

        if ($sql_result) {
            if (mysqli_num_rows($sql_result) == 1) {
                $row = mysqli_fetch_assoc($sql_result);
                // Verify Password
                if (password_verify($_POST['password'],$row['Password'])) {
                    // Login Success
                    session_start();

                    $_SESSION['login'] = array(true,$row['Username']);
                    header('Location: ../explorer.php?error=none');
                    exit();
                } else {
                    header('Location: ../login.php?error=Password Is Incorrect');
                    exit();
                }
            } else {
                header('Location: ../login.php?error=No Account Found');
                exit();
            }
        } else {
            echo "Error:" . $sql . "<br>" . $connection->error;
        }
        $connection->close();
    }
}

<?php
if(isset($_POST['submitForm'])){
    include '../php/connection.php';

    $Name = mysqli_real_escape_string($connection, $_POST['Name']);
    $ID = mysqli_real_escape_string($connection, $_POST['ID']);
    $AccType = mysqli_real_escape_string($connection, $_POST['AccType']);
    $eMail = mysqli_real_escape_string($connection, $_POST['eMail']);
    $Opinion = mysqli_real_escape_string($connection, $_POST['Opinion']);


    if(empty($Name) || empty($ID) || empty($AccType) || empty($eMail) || empty($Opinion)){
        header('Location: ../aboutUs.html?error=Fields Can Not Be Empty');
        exit();
    }else{
        $query = "INSERT INTO `opinion` (`Name` , `ID` , `AccType` , `eMail` , `Opinion`) VALUES('{$Name}','{$ID}','{$AccType}','{$eMail}','{$Opinion}')";

        if (mysqli_query($connection,$query)) {
            header("Location: ../aboutUs.html?error=Your response is succesfully submited");
            exit();
        } else {
            echo $connection->errno;
        }
    }
}else{
    header('Location: ../aboutUs.html');
    exit();
}
?>
<?php
if (isset($_POST['login-submit'])){
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    if(empty($mailuid) || empty($password) ) {
        header("Location:../index.php?error=emptytfiedlds");
        exit();
    }
    else{
        try{
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=loginsystem", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 

        $sql = "SELECT * FROM users WHERE uidUsers=:uidUsers OR emailUsers=:emailUsers";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':uidUsers',  $mailuid);
        $stmt->bindParam(':emailUsers', $mailuid);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            $inputPwd = $_POST["pwd"];
            $pwdCheck = password_verify($inputPwd, $row['pwdUsers']);
            if ($pwdCheck == false){
                header("Location:../index.php?error=wrongpwd");
                exit();
            }
            else if($pwdCheck == true){
                session_start();
                $_SESSION['userId'] = $row['idUsers'];
                $_SESSION['userUid'] = $row['uidUsers'];

                header("Location:../index.php?login=success");
                exit();
            }
            else{
                header("Location:../index.php?error=wrongpwd");
                exit();
            }
        }
        else{
            header("Location:../index.php?error=nouser");
            exit();
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    }
}
else{
    header("Location:../index.php");
    exit();
}
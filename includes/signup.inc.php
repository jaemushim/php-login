<?php
if (isset($_POST['signup-submit'])){
    echo ("hi");

    $userID = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if(empty($userID) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location:../signup.php?error=emptytfiedlds&uid=".$userID."mail=".$email);
        exit();
    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userID)){
        header("Location:../signup.php?error=invalidmailuid");
        exit();
    }

    else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location:../signup.php?error=invalidmail&uid=".$userID);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $userID)){
        header("Location:../signup.php?error=invalidmail&uid=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat){
        header("Location:../signup.php?error=passwordcheck&uid=".$userID."mail=".$email);
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

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=:uidUsers";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':uidUsers',  $userID);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo count($result);

        if(count($result) > 0){
            header("Location:../signup.php?error=usertaken&mail=".$email);
            exit();
        }
        else{
            try{
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (:uidUsers,:emailUsers,:pwdUsers)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':uidUsers',  $userID);
            $stmt->bindParam(':emailUsers',  $email);
            $stmt->bindParam(':pwdUsers',  $hashedPwd);
            $stmt->execute();
            header("Location:../signup.php?signup=success");
            exit();
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    }
}
else{
    header("Location:../signup.php");
    exit();
}
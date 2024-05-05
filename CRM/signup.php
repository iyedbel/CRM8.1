<?php 
session_start();
include "config.php";

if(isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['ré-password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $prenom = validate($_POST['prenom']);
    $telephone = validate($_POST['telephone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $ré_password = validate($_POST['ré-password']);

   
    
   if(empty($name)){
        header("Location: index.php?error1=nom is required&$user_data");
        exit();
    } elseif(empty($prenom)){
        header("Location: index.php?error1=Prenom is required&$user_data");
        exit();
    } elseif(empty($telephone)){
        header("Location: index.php?error1=telephone is required&$user_data");
        exit();
    }elseif(empty($email)){
        header("Location: index.php?error1=email is required&$user_data");
        exit();
    }elseif(empty($password)){
        header("Location: index.php?error1=Password is incorrecte&$user_data");
        exit();
    }elseif(empty($ré_password)){
        header("Location: index.php?error1=the confirmation does not matching&$user_data");
        exit();
    }elseif($password!==$ré_password){
        header("Location: index.php?error1=the confirmation does not matching&$user_data");
        exit();}
     else {
        $sql = "SELECT * FROM client WHERE nom='$name' ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            header("Location: index.php?error1=the username is taking try another&$user_data");
            exit();
        }else{
            $sql2 ="INSERT INTO client(nom, prenom, email,telephone, password) VALUES('$name', '$prenom', '$email','$telephone', '$password')";
        }
        $result2 = mysqli_query($conn, $sql2);
        if($result2){
            header("Location: index.php?succes=Your account has been created succesfully");
            exit();
        }else{
            header("Location: index.php?error1=Unknown error occurred&$user_data");
            exit();
        }


} /*else {
    header("Location: index.php?error");
    exit();*/
}
?>

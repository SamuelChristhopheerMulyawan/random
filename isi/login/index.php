<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>LOGIN</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
<link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="POST"+;;;;;;;;;;;;;;;;;;;;;>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="User name" name="username">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password">
                    </div>
                    <button class="button login__submit" name="login">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
               
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</body>

</html>

<?php 
session_start();
include 'connection.php'; 
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){
$username = $_POST['username'];
$password= $_POST['password'];
if(empty($username)){
    echo "<script>alert('Harap isi nama');</script>";
}elseif(empty($password)){
    echo "<script>alert('Harap isi passwrod');</script>";
}
else{
    $query = "SELECT * FROM `tb_admins` where usern= ? and passwd= ?";
    $preparing = mysqli_prepare($connect, $query); 
    if($preparing){
        mysqli_stmt_bind_param($preparing, "ss", $username, $password);
        mysqli_stmt_execute($preparing);
        $res = mysqli_stmt_get_result($preparing);

        if (mysqli_num_rows($res) == 1){
            echo "<script>alert('Selamat datang');</script>";
            header("Location: ../isi/dashboard.html");
            $_SESSION['username'] = $username;
        }else{
            echo "<script>alert('Password Salah');</script>";
        }
    }

}
if(isset($_SESSION['username'])){
    header("Location: ../dashboard.php");
}
}
?>
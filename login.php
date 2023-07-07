<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: bud.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: bud.php");
                            
                        }
                    }

                }

    }
}    


}


?>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="homepage.css">
</head> 
<style>
  #login_form
{
    width: 400px;
    height: 300px;
    margin-top:50px;
    margin-left:80px;
    padding: 20px;
    border: 2px solid #808080;
    background-color:#9DB2BF ;
    border-radius:20px;
    box-shadow: 5px 5px 5px rgba(30,50,40,0.5);
 }
h1 
{
    text-align: center;
    margin: 0 0 20px;
}
input{
    margin: 5px 0;
    padding: 15px;
    width: 30%;
    border: 1px solid grey;
    border-radius:20px;
}
#login_button{
    margin: 20px 0 0 0;
    padding: 15px 8px;          
    width: 10%;
    height:10%;
    border: 1px solid hsla(0,72%,27%,0);
    font: bold 1.2em myFirstFont;
    color: #fff;
    background-color: #526D82;
    border-radius:20px;
    box-shadow: 5px 10px 10px rgba(30,50,40,0.5);
 }
input:focus
{
	outline:0;
    box-shadow: 5px 5px 5px rgba(30,50,40,0.5);
} 
body{
    background-color:#DDE6ED ;
}

</style>
<body>
    <div align="center">
<form action="" method="post">
    <h1>Login</h1>
    <input type="text" placeholder="username" name="username" required=""><br>
    <input type="password" placeholder="Enter your password" name="password" required="">  
    <div align="center">
    <input id="login_button" type="submit" value="Login"></input> <br><br>
    </div>        
    <a href="forgotpassword.html">Forgot password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="register.php">Create account</a>
</form>
</div>
</body>
</html>

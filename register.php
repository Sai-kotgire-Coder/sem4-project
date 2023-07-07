<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>


<!doctype html>
<html>
<head>
<title>sign-in Page</title>
<link rel="stylesheet" type="text/css" href="homepage.css">
</head> 
<style>
  #login_form
{
    width: 400px;
    height: 400px;
    margin-top:50px;
    margin-left:80px;
    padding: 20px;
    border: 2px solid #808080;
    background-color:#D2E9E9 ;
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
    width: 90%;
    border: 1px solid grey;
    border-radius:20px;
}
#login_button{
    margin: 20px 0 0 0;
    padding: 15px 8px;          
    width: 120px;
    height:50px;
    border: 1px solid hsla(0,72%,27%,0);
    font: bold 1.2em myFirstFont;
    color: #fff;
    background-color: #9DB2BF;
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
<form id="login_form" method="post">
    <h1>Sign-in</h1>
    <input type="text" placeholder="name" name="username" required="">
    <input type="password" placeholder="password"name="password" required="">
    <input type="password" placeholder="cofirm password"name="confirm_password" required="">
    <input type="text" placeholder="Firstname" name="Fname" >
    <input type="text" placeholder="university"name="university">
    <div align="center">
    <input id="login_button" type="submit" value="submit"></input> <br><br>
    </div>        
    <a href="forgotpassword.html">Forgot password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="login.html">LOGIN</a>
</form>
</div>
</body>
</html>
 
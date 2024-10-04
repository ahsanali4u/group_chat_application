<?php
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']['user_email'])
{
  header("location:dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
     .one{
        border: 1px solid black;
        background-color: lightblue;
        width: 30%;
        border-radius: 10px;
     }
     body{
        background-color: lightseagreen;
     }
     a{
        text-decoration: none;
     }
     button{
        padding: 3px;
     }
     td{
        font-weight: bolder;
     }
     h2{
       background-color: skyblue;
       padding: 10px;
       width: 30%;
       border-radius: 10px;
       font-variant: small-caps;
       font-family: Arial, Helvetica, sans-serif;
     }
     h1{
        background-color: skyblue;
        padding: 10px;
        width: 50%;
        border-radius: 10px;
        font-variant: small-caps;
        font-family: Arial, Helvetica, sans-serif;
     }
     p{
        font-weight: bold;
     }
    </style>
</head>
<body>
    <center> 
    <h1>Group Chat Application</h1>   
    <h2>Login Page</h2> 
    
    <p> <?= $_GET['msg']??''?> </p>
    <div class="one"> 
    <form action="process.php" method="POST">
        <table border="0" cellspacing="1" cellpadding="10">
            <tr> 
           <td>Email: </td>
           <td><input type="email" name="user_email"></td>
           </tr>
           <tr> 
           <td>Password: </td>
           <td><input type="password" name="user_password"></td>
           </tr>
           <tr align="center">
            <td colspan="2">
            <input type="submit" name="login" value="Login" style="padding: 5px">
           
            
           </td>
           </tr>
        </table>
    </form>
    </div>
    <p>Not Have an account?  &nbsp; <button style="border-radius: 5px"><a href="register.php">Register Here</a></button></p>
    </center>
</body>
</html>
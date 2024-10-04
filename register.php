<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register You Account</title>
    <style>
    .one{
        border: 1px solid black;
        background-color: lightblue;
        width: 40%;
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
     h1{
     background-color: skyblue;
     padding: 10px;
     width: 48%;
     border-radius: 10px;
     font-variant: small-caps;
     font-family: Arial, Helvetica, sans-serif;
     }
    </style>
</head>
<body>
    <center>
        <h1>Register Your Account</h1>
       
	    <p> <?php echo $_GET['msg']??''?> </p>
        <div class="one"> 
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <table border="0" cellpadding="10" cellspacing="1">
                <tr>
                    <th>First Name: </th>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <th>Last Name: </th>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr>
                    <th>Gender: </th>
                    <td>
                        <input type="radio" name="gender" value="male"> Male
                        <input type="radio" name="gender" value="female"> Female              
                    </td>
                </tr>
                <tr>
                    <th>User Email: </th>
                    <td><input type="email" name="user_email" required></td>
                </tr>
                <tr>
                    <th>User Password: </th>
                    <td><input type="password" name="user_password" required></td>
                </tr>
                <tr>
                    <th>Profile Pic: </th>
                    <td><input type="file" name="profile_pic" required></td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                    <input type="submit" name="register" value="Register">
                    <p>Already Have an account? <button><a href="login.php">Login Here</a></button></p>
                    </td>
                </tr>           
            </table>
            
        </form>
        </div>
     </center>
</body>
</html>
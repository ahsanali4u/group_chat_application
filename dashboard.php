<?php
require_once("require/database_class.php");
session_start();
if(!(isset($_SESSION['user']) && $_SESSION['user']['user_email']))
{
  header("location:login.php?msg=Please Login First");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="require/grid_view.css">
    <script>
        function users_status(){
            let abc = new XMLHttpRequest();
            abc.onreadystatechange = function(){
                if(abc.readyState == 4 && abc.status == 200){
                    document.querySelector("#users_status").innerHTML = abc.responseText;
                }
            }
            abc.open("GET","process.php?action=users_status");
            abc.send();
        }

        function send_message(){
            let users_message = document.querySelector("#users_message").value;
            let abc = new XMLHttpRequest();
            abc.onreadystatechange = function(){
                if(abc.readyState == 4 && abc.status == 200){
                    document.querySelector("#get_response").innerHTML = abc.responseText;
                    document.querySelector("#users_message").value = "";
                    show_all_messages();
                }
            }
            abc.open("GET","process.php?action=send_message&users_message="+users_message);
            abc.send();
        }
        function show_all_messages(){
            let abc = new XMLHttpRequest();
            abc.onreadystatechange = function(){
                if(abc.readyState == 4 && abc.status == 200){
                    document.querySelector("#show_message").innerHTML = abc.responseText;
                }
            }
            abc.open("GET","process.php?action=show_all_messages");
            abc.send();
        }
        
        setInterval("show_all_messages()", 2000);	
	    setInterval("users_status()", 1000);	
    </script>
</head>
<body onload="show_all_messages()">
    <center>
    <div class="row">
        <div class="col-12">
            <h1>Group Chat Application</h1>
            <h2 style="width: 40%;">Welcome <?= $_SESSION['user']['first_name']." ". $_SESSION['user']['last_name']; ?></h2>
            <button style="float: right; position: relative; bottom: 30%;  padding: 10px; margin-left: 20px;"><a style="text-decoration: none;" href="logout.php">Logout</a></button>
        </div>
    </div>

    <div class="row">
        <div class="col-3 border">
            <div class="row">
                <div class="col-12">
                    <h2 style="background-color: blanchedalmond; padding: 10px; border-radius: 10px;">Users Status</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="users_status" style="overflow: auto; height:450px">

                </div>
            </div>
        </div>

        <div class="col-9" style="height:auto">
            <div class="row">
            <div class="col-12">
                    <h2 style="background-color: blanchedalmond; padding: 20px;border-radius: 10px;">Users Messages</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12" id="get_response">

                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-12" id="show_message" style="overflow: auto; height: 400px">

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <textarea name="user_message" id="users_message" cols="100" style="float:left;"></textarea>
                    <button type="button" onclick="send_message()" style="float:left; padding:5px; width: 100px; margin-top:10px; margin-left:10px;">SEND</button>
                </div>
            </div>

        </div>
    </div>






    </center>
</body>
</html>
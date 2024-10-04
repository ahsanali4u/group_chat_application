<?php
  session_start();
  require_once("require/database_class.php");
  $database = new Database_connection(hostname,username,password,database);
  extract($_REQUEST);

 if(isset($_POST["register"])){
    
   $directory = "Images";
   if(!is_dir($directory)){
    if(!mkdir($directory)){
        echo "Directory Not Created";
    }
   }

    $file_name = $_FILES['profile_pic']['name'];
    $temp_name = $_FILES['profile_pic']['tmp_name'];
    $file_path = $directory."/".$file_name;
    
    move_uploaded_file($temp_name,$file_path);
    $query = "INSERT INTO users (first_name,last_name,gender,user_email,user_password,file_name,file_path_name) 
    VALUES ('".$first_name."', '".$last_name."','".$gender."', '".$user_email."',
    '".$user_password."','".$file_name."' , '".$file_path."')";
    
    $result = $database->execute_query($query);
    if($result){
        header("location:register.php?msg=Registration Successfully");
    }else{
        header("location:register.php?msg=Registration Failed");
    }

   }elseif(isset($_POST['login'])){
    
    $query ="SELECT * FROM users WHERE user_email='".$user_email."' AND user_password='".$user_password."'";
    $result = $database->execute_query($query);

    if($result->num_rows > 0){
        $data = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $data;
        $_SESSION['user']['user_email'] = '$user_email'; 
        $query = "UPDATE users SET online_status = '1' WHERE user_id = '".$data['user_id']."' ";
        $result = $database->execute_query($query);
        header("location:dashboard.php");
    }else{
        header("location:login.php?msg=Incorrect Email And Password");
    }
}


    if(isset($action) && $action == "users_status"){
        $query = "SELECT * FROM users u WHERE u.user_id != '".$_SESSION['user']['user_id']."' ORDER BY online_status DESC";
        $result = $database->execute_query($query);

        if($result->num_rows > 0){
            while($data = mysqli_fetch_assoc($result)){
                extract($data);
                if($online_status == 1){
                    $color = "green";
                    $status = "Online ●";
                }else{
                    $color = "red";
                    $status = "Offline ●";
                }
                ?>
                <div class="border" style="background-color: lightblue; margin-bottom: 10px;">
                    <table>
                        <tr>
                            <td>
                                <img src="<?= $file_path_name ?>" width="50px" height="50px" style="border-radius: 50%;" >
                            </td>
                            <th style="width:50%">
                                <?= $first_name." ".$last_name ?>
                            </th>
							<th style="color:<?= $color ?>">
                                <?= $status ?>
                            </th>

                        </tr>
                    </table>

                </div>

                <?php

            }
        }else{
            echo "Users Not Found";
        }

    }elseif(isset($action) && $action == "send_message"){
        $query = "INSERT INTO messages VALUES (NULL,'".$_SESSION['user']['user_id']."','".htmlspecialchars($users_message)."',NOW())";
        $result = $database->execute_query($query);

        if($result){
            echo "Message Send Successfully";
        }else{
            echo "Message Not Send";
        }

    }elseif(isset($action) && $action == "show_all_messages"){
        $query = "SELECT * FROM messages m INNER JOIN users u ON u.user_id = m.user_id ORDER BY m.message_id DESC";
        $result = $database->execute_query($query);

        if($result->num_rows > 0){
            while($data = mysqli_fetch_assoc($result)){
                extract($data);
                if($_SESSION['user']['user_id'] == $user_id){
                    $float = "right";
                    $bgcolor = "lightcoral";
                }else{
                    $float = "left";
                    $bgcolor = "lightblue";
                }
                ?>
                <div class="border" style="padding: 5px; float: <?= $float ?>; background-color: <?= $bgcolor ?>; margin-bottom: 10px;">
                    <p>
                        <img src="<?= $file_path_name; ?>" width="50px" height="50px" style="border-radius: 10px;">&nbsp;
                        <span><b><?= $first_name." ".$last_name ?></b></span>
                    </p>
                    <p><?= $message; ?></p>
				<span style="float: right;">Time: <?= $message_time; ?></span>
                </div>
                <p style="clear: both;"></p>
		      <?php
            }
        }else{
            echo "No Messages Found";
        }

    }

?>
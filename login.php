<style>
    #container {
        width: 350px;
        height : 400px;
        padding : auto;
        margin-left : 40%;
    }
    form{
        margin-top : 100px;
        margin-left : 20px;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
   
}
input[type=submit]{
    background-color : blue;
    width : 70px;
    height : 25px;
    border : 0;
    border-radius: 25%;
    color : white;
}
</style>
    <?php

    $UserDao = new \Dao\UserDao();
    $loginPressed = filter_input(INPUT_POST, 'btnSave');
    if(isset($loginPressed)){
        $username= filter_input(INPUT_POST, 'txtUsername');
        $pass = filter_input(INPUT_POST, 'txtPass');
        if(trim($username)=='' || trim($pass)== ''){
            echo 'please fill email and password';

        }else{
            $user = $UserDao -> login($username, $pass);
            if(!$user){
                echo '<div> invalid email or password </div>';
                
            }else if($user -> getUsername()== $username){
                $_SESSION['is_user_logged']= true;
                $_SESSION['user_name'] = $user->getName();
                header('location:index.php');
            }
        }
    }
    ?>
<div id = "container">
    <form method = "post"> 
        <label for = "txtUsername">Username</label>
        <br>
        <input type = "text" maxlength = 100 id = "txtUsername" name="txtUsername" placeholder = "Your Username">
        <br>
        <label for = "txtPass">Password</label>
        <br>
        <input type = "text" maxlength = 100 id = "txtPass" name="txtPass" placeholder = "Your Secret Key">
        <br>
        <input type="submit" name="btnSave" value="Login">

    </form>
</div>
<?php

?>

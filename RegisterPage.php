<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #ffb833;
        font-family: 'Arial';
    }

    .login {
        width: 382px;
        height: 420px;
        overflow: hidden;
        margin: auto;
        padding: 80px;
        background: #f0f0f0;
        border-radius: 15px;
    }

    h1 {
        text-align: center;
        color: white;
        padding: 4px 100px;
    }

    label {
        color: black;
        font-size: 17px;
    }
      #username {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

    #email {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

    #password {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

      #fullname {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 3px;
        padding-left: 8px;
    }

    input[type=text] {
        background-color: #e3e3e3;
        color: black;
    }

    input[type=submit] {
        background-color: #ffb833;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }

    .imgcontainer {
        width: 382px;
        height: 100px;
        overflow: hidden;
        margin: auto;
        padding: 80px;
        border-radius: 15px;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
        padding: 4px 100px;
    }
    a:link, a:visited {
        background-color: #ffb833;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }


</style>
<?php
    include('server.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];  
    $useremail = $_POST['useremail'];  
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $userfullname= $_POST['userfullname'];

 
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $useremail = stripcslashes($useremail);
        $useremail= filter_var($useremail, FILTER_VALIDATE_EMAIL);
        $password = stripcslashes($password);  
        $rpassword = stripcslashes($rpassword);  
        $userfullname = stripcslashes($userfullname);  
        $username = mysqli_real_escape_string($con, $username);  
        $useremail = mysqli_real_escape_string($con, $useremail);  
        $password = mysqli_real_escape_string($con, $password);  
        $rpassword = mysqli_real_escape_string($con, $rpassword);  
        $userfullname = mysqli_real_escape_string($con, $userfullname);       
        $sql = "INSERT into users (username, useremail, password, userrole, userfullname)
                     VALUES ('$username','$useremail','$password','3','$userfullname')";
        $result = mysqli_query($con, $sql);  
        if ($result) {

            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='loginpage.php'>Login</a></p>
                  </div>";
        }
        else{  
            echo "<h1> Register failed. Invalid username or password.</h1>";  
        }   
    }
?>
<body>
    <h1>Sign Up</h1>
    <div class="login">
        <img src="avatar.png" alt="Avatar" class="avatar">
        <form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="useremail">Email:</label><br>
            <input type="text" id="email" name="useremail"><br>
            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password"><br />
            <label for="rpassword">Repeat Password:</label><br>
            <input type="text" id="password" name="rpassword"><br />
            <label for="userfullname">Full Name:</label><br>
            <input type="text" id="fullname" name="userfullname"><br />
            <input type="submit" value="Submit" onclick="validation()">
            <a href="loginpage.php" target="_blank">Log in</a>
        </form>
    </div>
    <script>  
            function validation()  
            {  
                var id=document.f2.username.value;  
                var ps=document.f2.password.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>
</body>
</html>
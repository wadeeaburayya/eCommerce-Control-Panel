<?php      
    include('server.php');
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
        $rpassword = stripcslashes($rpas+sword);  
        $userfullname = stripcslashes($userfullname);  
        $username = mysqli_real_escape_string($con, $username);  
        $useremail = mysqli_real_escape_string($con, $useremail);  
        $password = mysqli_real_escape_string($con, $password);  
        $rpassword = mysqli_real_escape_string($con, $rpassword);  
        $userfullname = mysqli_real_escape_string($con, $userfullname);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($username) || empty($userfullname) || empty($password)){
          echo "<div class='form'>
                  <h3>Please Fill all the fields </h3><br/>
                  <p class='link'>Click here to <a href='loginpage.php'>Login</a></p>
                  </div>";
        }else{
       

     
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
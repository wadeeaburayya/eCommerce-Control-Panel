<?php
// Include config file
require_once "config1.php";
error_reporting(0);

// Define variables and initialize with empty values
$username = $useremail = $password = $confirm_password = $userfullname = $userrole = "";
$username_err = $useremail_err = $password_err = $confirm_password_err = $userfullname_err ="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

     

    // Validate email
    if(empty(trim($_POST["useremail"]))){
        $useremail_err = "Please enter an email.";
    }
     else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE useremail = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);

            // Set parameters
            $param_useremail = trim($_POST["useremail"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $useremail_err = "This email is already taken.";
                } else{
                    $useremail = trim($_POST["useremail"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
    // Validate password

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate fullname
    if(empty(trim($_POST["userfullname"]))){
        $userfullname_err = "Please enter your fullname.";
    }
     else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE userfullname = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_userfullname);

            // Set parameters
            $param_userfullname = trim($_POST["userfullname"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $userfullname_err = "This fullname is already taken.";
                } else{
                    $userfullname = trim($_POST["userfullname"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    

    // Check input errors before inserting in database
    if(empty($username_err) && empty($useremail_err) && empty($password_err) && empty($confirm_password_err) && empty($userfullname_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, useremail, password, userfullname, userrole ) VALUES (?, ?, ?, ?, 3)";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_useremail, $param_password, $param_userfullname);

            // Set parameters
            $param_username = $username;
            $param_useremail = $useremail;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_userfullname = $userfullname;



            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: home.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        background-color: #ffb833;
        font-family: 'Arial';
    }

    .login {
        width: 500px;
        height: 630px;
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

    input[type=reset] {
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
</head>
<body>
    <div class="login">
        <h2>Sign Up</h2>
        <img src="avatar.png" alt="Avatar" class="avatar">
        <p>Please fill this form to create an account.</p>
        <form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
            " method="post">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

                <label>Email</label>
                <input type="useremail" id="email" name="useremail" class="form-control <?php echo (!empty($useremail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $useremail; ?>">
                <span class="invalid-feedback"><?php echo $useremail_err; ?></span>


                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                <label>Confirm Password</label>
                <input type="password" id="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>

                <label>Full Name</label>
                <input type="userfullname" id="fullname" name="userfullname" class="form-control <?php echo (!empty($userfullname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $userfullname; ?>">
                <span class="invalid-feedback"><?php echo $userfullname_err; ?></span>


                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </form>
    </div>
</body>
</html>
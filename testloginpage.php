<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #ffb833;
        font-family: 'Arial';
    }
    .login12 {
        width: 382px;
        height: 380px;
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
    #password{
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
    button {
        background-color: #ffb833; 
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>
<body>
    <h1>Login Page</h1>
    <div class="login12">
        <img src="avatar.png" alt="Avatar" class="avatar">

        <form name="f1" id="login" action="auth_sessionLOGIN.php" onsubmit = "return validation()" method="POST">
            <label for="username">username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password"><br />
            <input type =  "submit" id = "btn" value = "Login" />  
        </form>
    </div>

    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
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
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
* {
	box-sizing: border-box;
}
    body {
        margin: 0;
        padding: 0;
        background-color: #ffb833;
	width: 100%;
	height: 100%;
	background-size: cover;
	content: "";
	position: fixed;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -1;
	display: block;
    font-family: poppins;
	font-size: 16px;
	color: #fff;
    }
    .login12:before {
	
	width: 100%;
	height: 100%;
	background-size: cover;
	content: "";
	position: fixed;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -1;
	display: block;
	filter: blur(2px);
}
    .login12 {
       background-color: rgba(0, 0, 0, 0.5);
	margin: auto auto;
	padding: 40px;
	border-radius: 5px;
	box-shadow: 0 0 10px #000;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	width: 500px;
	height: 430px;
    }
    h1 {
        font-size: 32px;
	font-weight: 600;
	padding-bottom: 30px;
	text-align: center;
    }

    label {
  position: relative;
	margin-left: 5px;
	margin-right: 10px;
	top: 5px;
	display: inline-block;
	width: 20px;
	height: 20px;
	cursor: pointer;
    }
    #username {
       margin: 10px 0px;
	border: none;
	padding: 10px;
	border-radius: 5px;
	width: 100%;
	font-size: 18px;
	font-family: poppins;
    }
    #email {
        margin: 10px 0px;
	border: none;
	padding: 10px;
	border-radius: 5px;
	width: 100%;
	font-size: 18px;
	font-family: poppins;
    }
    #password{
       margin: 10px 0px;
	border: none;
	padding: 10px;
	border-radius: 5px;
	width: 100%;
	font-size: 18px;
	font-family: poppins;
    }
    input[type=text] {
        font-size: 32px;
	font-weight: 600;
	padding-bottom: 30px;
	text-align: center;
    margin: 10px 0px;
	border: none;
	padding: 10px;
	border-radius: 5px;
	width: 100%;
	font-size: 18px;
	font-family: poppins;
    }
    input[type=submit] {
        background-color: orange;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
	padding: 10px;
	margin: 20px 0px;
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
        background-color: deepskyblue;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
	padding: 10px;
	margin: 20px 0px;
    }
    a{
        background-color: deepskyblue;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
	padding: 10px;
	margin: 20px 0px;
    }

</style>
<body>
    <h1>Login Page</h1>
    <div class="login12">
        <img src="avatar.png" alt="Avatar" class="avatar">

        <form name="f1" id="login" action="home.php" onsubmit = "return validation()" method="POST">
            <label for="username">username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password"><br />
            <input type =  "submit" id = "btn" value = "Login" />
            <a href="RegisterPage.php" target="_blank">Register</a>
        </form>
    </div>

    <script>  
            function validation()  
            {  
                var id=document.f1.username.value;  
                var ps=document.f1.password.value;  
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
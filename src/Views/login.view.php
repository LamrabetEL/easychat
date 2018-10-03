<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}
.error{color:red;}
</style>
</head>
<body>
	<h2>Login to enjoy chat</h2>
	<div id="id01" class="modal">
	  
	  <form method="POST" action="/index/login">
		<div class="container">
		  <label for="uname"><b>Username</b></label>
		  <input type="text" placeholder="Enter Username" name="uname" required>

		  <label for="psw"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="psw" required>
      <span class="error"><?php if(isset($error)){echo $error;} ?></span> 
		  <button type="submit">Login</button>
		</div>
	  </form>
    <a href="/index/register">register</a>
	</div>
</body>
</html>

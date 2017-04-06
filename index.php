<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Week 2 Code Challenge</title>
    </head>
    <body>
	<h2>Welcome to the Code Challenge!</h2>
	
		<?php
		
		if (isset($_POST['submit'])) {
		
		// write code to get the user's username and password.
		// check the username and password against the users.txt file
		// if the username and password pair exist in the users.txt file
		// display a message that the user has been logged in.
		// if the username and password pair is not found
		// display a message that the username or password was not found.
      $fp = fopen("users.txt", "r");
    
      while(!feof($fp)) {
          
          $line = rtrim(fgets($fp));
          
          if($line) {
            list($username, $password) = explode(",", $line);
            $login = array($username => $password);
            
          }
          
          
          if(!$line) {
            echo "Username and password did not match!";
          } elseif($_POST["username"] == $username && $_POST["password"] == $password) {
            echo "$username has logged in!";
            break;
          } 
          
      }
      
		
		} else {
            
        ?>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <label for="username">Please enter your username:</label>
            <input type="text" name="username" id="name" value="">
             <br><br>
			<label for="password">Please enter your password:</label>
            <input type="text" name="password" id="password" value="">
             <br><br>

           <input type="submit" name="submit" value="Login">
          
        </form>
		
		<?php
		} // end else (form was not submitted)
    
    
    
		?>
    </body>
</html>
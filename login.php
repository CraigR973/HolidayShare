<html>
    <head>
        <title>Holiday Share</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="276x299" href="docs/logo.png">
        <link rel="apple-touch-icon" href="docs/logo.png">
        <link rel="stylesheet" type="text/css" href="holiday.css">
     
    </head>
    <body>
        <h1>Login</h1>
        
           
            
                <p class="login">
                Username <input type="text" name="username" id="username" placeholder="Username"><br>
                Password <input type="password" name="password" id="password" placeholder="Password"><br>
                <br><br>
                <input type="submit" value="Login" name="Login" id="login">
                </p>
            
            </form>
        
        
            
            <?php
            
            //connect to database
            $servername = "devweb2016.cis.strath.ac.uk";
            $username = "cs312r";
            $password = "seK8Veihau7d";
            $database = "cs312r";
            $conn = new mysqli($servername, $username, $password, $database);

            if($conn ->connect_error){
                die("Connection Failed : ".$conn->connect_error);
            }
            
            $loginusername = isset($_POST['username']) ? $conn-> real_escape_string($_POST['username']): "";
            $loginpassword = isset($_POST['password']) ? $conn-> real_escape_string($_POST['password']): "";
        
            //issue query
            $sql = "SELECT * FROM `Members`";
            $result = $conn ->query($sql);
            
            if(isset($_POST["Login"])){
            //handle results
            if(!$result){
                die("Query Failed ".$conn->error);
            }
            
            else if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                   
                    $checkLoginUsername = $row["username"];
                    $checkLoginPassword = $row["password"];
                
                    if(($loginusername === $checkLoginUsername) && $loginpassword == $checkLoginPassword){
                        session_start();
                        $_SESSION['username'] = $loginusername;
                        header('Location: menu.php');
                    }
                    
                }
                echo "<p>Incorrect Username or Password. Please Re-enter</p>";
            }
            }
            
                //close connection
                $conn ->close();
                
        ?>
        
        
        
    </body>
</html>

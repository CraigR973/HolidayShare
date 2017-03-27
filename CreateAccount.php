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
        <link rel="stylesheet" type="text/css" href="normalize.css"/>
        <script>
            function checkForm(){
                var errs = "";
                var enteredusername = document.forms["myform"]["newusername"];
                var entereduserpassword = document.forms["myform"]["newpassword"];
        
                enteredusername.style.background = "white";
                entereduserpassword.style.background = "white";
                
                if((enteredusername.value==null) || (enteredusername.value=="")){
                    errs+="   * Username must not be empty\n";
                    enteredusername.style.background = "pink";
                }
                
                if((entereduserpassword.value==null) || (entereduserpassword.value=="")){
                    errs+="   * Password must not be empty\n";
                    entereduserpassword.style.background = "pink";
                }
                
                if(errs!==""){
                    alert(errs);
                }
                
                return (errs=="");
                
            }
            
        </script>
    </head>
    <body class="background">
        <h1 id="title">Create Account</h1>
        
            <form method="post" name="myform" onsubmit="return checkForm();">
            
                <p class="login">
                <input type="text" name="newusername" id="username" placeholder="Username"><br>
                <input type="text" name="newpassword" id="password" placeholder="Password"><br>
                <br><br>
                <input type="submit" value="Create Account" name="CreateAccount" id="create">
                </p>
            
            </form>
        
        <div class="loginbuttons">
            <a href="welcome.php"><input type="submit" value="Back To Start Page" id="create"></a>
        </div>
        
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
        
        //setup variables from$_POST
        
        $newusername = isset($_POST['newusername']) ? $conn-> real_escape_string($_POST['newusername']): "";
        
        //Do password hashing later
        //$newpassword = isset($_POST['newpassword']) ? $conn-> real_escape_string(password_hash($_POST['newpassword'],PASSWORD_DEFAULT)): ""; //real escape string may cause issues
        
        $newpassword = isset($_POST['newpassword']) ? $conn-> real_escape_string($_POST['newpassword']): "";
        
        if(isset($_POST["CreateAccount"])){
        $sql = "INSERT INTO `Members` ( `username`, `password`, `location`) VALUES  ('$newusername','$newpassword', 'null')";
        if($conn->query($sql) === TRUE){
            echo"<h2>Account Created!</h2>";
        } else{
            die("Error on insert ".$conn->error);
        }     
        }
        
        //Close connection
        $conn ->close();
        
        ?>
        
    </body>
</html>

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
                var errors = "";
                var entered_username = document.forms["myform"]["newusername"];
                var entered_user_password = document.forms["myform"]["newpassword"];
                var confirm_user_password = document.forms["myform"]["confirmpassword"];
                var entered_email = document.forms["myform"]["email"];
                var entered_phone = document.forms["myform"]["phone"];

                entered_username.style.background = "white";
                entered_user_password.style.background = "white";
                entered_email.style.background = "white";
                entered_phone.style.background = "white";
                
                if((entered_username.value===null) || (entered_username.value==="")){
                    errors+="   * Username must not be empty\n";
                    entered_username.style.background = "pink";
                }
                
                if((entered_user_password.value===null) || (entered_user_password.value==="")){
                    errors+="   * Password must not be empty\n";
                    entered_user_password.style.background = "pink";
                } else {
                    if (confirm_user_password.value !== entered_user_password.value) {
                        errors += "   * Passwords must match\n";
                        entered_user_password.style.background = "pink";
                        confirm_user_password.style.background = "pink";
                    }
                }
                  if((entered_email.value===null) || (entered_email.value==="")){
                    errors+="   * Email must not be empty\n";
                    entered_email.style.background = "pink";
                }
                  if((entered_phone.value===null) || (entered_phone.value==="")){
                    errors+="   * Phone number must not be empty\n";
                    entered_phone.style.background = "pink";
                }
                
                if(errors!==""){
                    alert(errors);
                }
                
                return (errors==="");
                
            }
            
        </script>
    </head>
    <body class="background">
        <h1 id="title">Register</h1>
        
        <form method="post" enctype="multipart/form-data" name="myform" onsubmit="return checkForm();">
            
                <p class="login">
                <input type="text" name="newusername" id="username" placeholder="Username"><br>
                <input type="password" name="newpassword" id="password" placeholder="Password"><br>
                <input type="password" name="confirmpassword" id="password" placeholder="Confirm password"><br>
                <input type="email" name="email" id="username" placeholder="Email"><br>
                <input type="tel" name="phone" id="username" placeholder="Mobile Phone"><br>
                <br>
                <label for="fileToUpload" id="buttons" style="margin-left: 5vw; margin-right: 5vw;">Add Profile Picture</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br><br>
                <input type="submit" value="Create Account" name="CreateAccount" id="buttons">
                </p>
            
            </form>
        
        <div class="login">
            <a href="login.php"><input type="submit" value="Login" id="buttons"></a>
            <a href="welcome.php"><input type="submit" value="Back" id="buttons"></a>
        </div>
        
        <?php
        $fileUploaded = true;

        //connect to database
        
        $servername = "devweb2016.cis.strath.ac.uk";
        $username = "cs312r";
        $password = "seK8Veihau7d";
        $database = "cs312r";
        $conn = new mysqli($servername, $username, $password, $database);
        
        if($conn ->connect_error){
            die();
        }

            if(isset($_POST["CreateAccount"])) {
                
            $dir = "docs/profilepictures/";
            $upload = explode(".", $_FILES["fileToUpload"]["name"]);
            $fileName = $_POST['newusername'] . '.' . end($upload);
            $file = $dir . basename($fileName);
            $imageFileType = pathinfo($file,PATHINFO_EXTENSION);
                
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check == false) {
                $fileUploaded = false;
            }
            

//            if (file_exists($file)) {
//                $fileUploaded = false;
//            }

//            if ($_FILES["fileToUpload"]["size"] > 500000) {
//                $fileUploaded = false;
//            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $fileUploaded = false;
            }

            if($fileUploaded){
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file);
            }
            
            } else {
            $fileUploaded = false; 
            }

        
        //setup variables from$_POST
        
        $newusername = isset($_POST['newusername']) ? $conn-> real_escape_string($_POST['newusername']): "";
        
        //Do password hashing later
        //$newpassword = isset($_POST['newpassword']) ? $conn-> real_escape_string(password_hash($_POST['newpassword'],PASSWORD_DEFAULT)): ""; //real escape string may cause issues
        
        $newpassword = isset($_POST['newpassword']) ? $conn-> real_escape_string(password_hash($_POST['newpassword'],PASSWORD_DEFAULT)): "";
        $email = isset($_POST['email']) ? $conn-> real_escape_string($_POST['email']): "";
        $phone = isset($_POST['phone']) ? $conn-> real_escape_string($_POST['phone']): "";
        
        
        if(isset($_POST["CreateAccount"])){
            if($fileUploaded){    
                $sql = "INSERT INTO `Members` ( `username`, `password`, `email`, `phone`, `location`, `ProfilePic`) VALUES  ('$newusername','$newpassword', '$email', '$phone', 'null', '$fileName')";
                if($conn->query($sql) === TRUE){
                    echo"<h2>Success your account was created! Please click login to sign in with your new detaisl</h2>";
                    
                } else{
                    die();
                }     
            } else {
                $sql = "INSERT INTO `Members` ( `username`, `password`, `email`, `phone`, `location`, `ProfilePic`) VALUES  ('$newusername','$newpassword', '$email', '$phone',  'null', 'null')";
                if($conn->query($sql) === TRUE){
                    echo"<h2>Success your account was created! Please click login to sign in with your new detaisl</h2>";
                    
                } else{
                    die();
                } 
            }        
        }
        
        //Close connection
        $conn ->close();
        
        ?>
        
    </body>
</html>

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
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body {margin:0;}

            .icon-bar {
                width: 100%;
                background-color: #adf7f7;
                overflow: auto;
                position: fixed;
                bottom: 0;
            }

            .icon-bar a {
                float: left;
                width: 20%;
                text-align: center;
                padding: 12px 0;
                transition: all 0.3s ease;
                color: grey;
                font-size: 18px;
                text-decoration: none;
            }

            .icon-bar a:hover {
                background-color: darkblue;
            }

            .active {
                background-color: darkblue;
               
            }
            
            .main {
                margin-bottom: 25vw;
            }
        </style>
        
        
        
    </head>
    <body>
        
        <div class="icon-bar">
            <a href="menu.php"><i class="fa fa-home"></i><br/>Home</a>
            <a href="profile.php"><i class="fa fa-user-o"></i><br/>My HS</a>
            <a href="find.php"><i class="fa fa-search"></i><br/>Search</a>
             
            <a href="About.php"><i class="fa fa-info"></i><br/>About</a>
            <a class="active"href="#"><i class="fa fa-share-alt"></i><br/>Share</a> 
        </div>
      <div class="main">
        <h1>Share</h1>
        <form method="post" enctype="multipart/form-data" name="myform">
            
            <p class="login">
                </br> <input type="text" name="name" id="username" placeholder="Name"><br><br>
                <br><br>
                <select id="type" name="type">
                    <option value ="" selected disabled>Item Type<br>
                    <option value="Suitcase">Suitcase</option>
                    <option value="Travel Accessory">Travel Accessory</option>
                    <option value="Camping">Camping</option>
                    <option value="Pool Toys">Pool Toys</option>
                </select>
                <br><br>
                <br><br>
                <textarea name = "desc" placeholder="Description..."></textarea>
                <br><br>
                <label for="fileToUpload" class="uploadPic">Add a Picture of Your Item</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br><br>
                <input type="submit" value="Post" name="Post" id="login">
                <br><br>
            </p>
            
        </form>
        
       
            
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
        
        $maxidsql = "SELECT MAX(`id`) AS 'maxid' FROM `Items`";     
        $maxidresult = $conn ->query($maxidsql);
        $maxid = $maxidresult->fetch_assoc();
        $id = $maxid['maxid'];
        
        if(isset($_POST["Post"])) {
            $dir = "docs/itemimages/";
            $upload = explode(".", $_FILES["fileToUpload"]["name"]);
            $newID = $id + 1;
            $fileName = $newID . '.' . end($upload);
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
             
        if(isset($_POST["Post"])){
            
            $name = isset($_POST['name']) ? $conn-> real_escape_string($_POST['name']): "";
            $type = isset($_POST['type']) ? $conn-> real_escape_string($_POST['type']): "";
            $desc = isset($_POST['desc']) ? $conn-> real_escape_string($_POST['desc']): "";
            session_start();
            $uname = $_SESSION['username'];
            if($fileUploaded){
                $sql = "INSERT INTO `Items` (`id`, `itemType`, `itemName`, `username`, `itemDescription`, `itemImage`) VALUES  ('$newID', '$type','$name','$uname','$desc', '$fileName')";
            } else{
                $sql = "INSERT INTO `Items` (`itemType`, `itemName`, `username`, `itemDescription`, `itemImage`) VALUES  ('$type','$name','$uname','$desc', 'null')";
            }
            
        
        if($conn->query($sql) === TRUE){
            echo"<h2>Your Item has been successfully listed for sharing</h2>";
        } else{
            die();
        } 
        
        }
        
        //
        
        ?>
      </div>
    </body>
</html>
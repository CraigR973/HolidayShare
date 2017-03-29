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
                position: absolute;
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
      
        <h1>Share</h1>
        <form method="post" name="myform">
            
            <p class="login">
                Item Name</br> <input type="text" name="name" id="username" placeholder="Name"><br><br>
                Item Type:<br><br>
                <select id="type" name="type">
                    <option value="Suitcase">Suitcase</option>
                    <option value="Travel Accessory">Travel Accessory</option>
                    <option value="Camping">Camping</option>
                    <option value="Pool Toys">Pool Toys</option>
                </select>
                <br><br>
                Item Description:<br><br>
                <textarea name = "desc" placeholder="Description..."></textarea>
                <br><br>
                <input type="submit" value="Post" name="Post" id="login">
                <br><br>
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
        
        if(isset($_POST["Post"])){
            
            $name = isset($_POST['name']) ? $conn-> real_escape_string($_POST['name']): "";
            $type = isset($_POST['type']) ? $conn-> real_escape_string($_POST['type']): "";
            $desc = isset($_POST['desc']) ? $conn-> real_escape_string($_POST['desc']): "";
            session_start();
            $uname = $_SESSION['username'];
            
            $sql = "INSERT INTO `Items` (`itemType`, `itemName`, `username`, `itemDescription`) VALUES  ('$type','$name','$uname','$desc')";
            
        
        
        if($conn->query($sql) === TRUE){
            echo"<h3>Insert Sucessful</h3>";
        } else{
            die("Error on insert ".$conn->error);
        } 
        
        }
        
        
        
        ?>
        
    </body>
</html>

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
            <a class="active"href="#"><i class="fa fa-user-o"></i><br/>My HS</a>
            <a href="find.php"><i class="fa fa-search"></i><br/>Search</a>
             
            <a href="About.php"><i class="fa fa-info"></i><br/>About</a>
            <a href="share.php"><i class="fa fa-share-alt"></i><br/>Share</a> 
        </div>

        
        
            
        <?php
        
            session_start();
            $memberusername = $_SESSION['username'];
            echo "<h1>$memberusername's Profile</h1>";
        
            //connect to database
            $servername = "devweb2016.cis.strath.ac.uk";
            $username = "cs312r";
            $password = "seK8Veihau7d";
            $database = "cs312r";
            $conn = new mysqli($servername, $username, $password, $database);

            if($conn ->connect_error){
                die("Connection Failed : ".$conn->connect_error);
            }
            
            $picsql = "SELECT `ProfilePic` FROM `Members` WHERE `username` = '$memberusername' AND `ProfilePic` != 'null'";        
            $picresult = $conn ->query($picsql);
            $row = $picresult->fetch_assoc();
               
            //close connection
            $conn ->close();
            
            if($picresult->num_rows === 0){
                echo "<img src='https://devweb2016.cis.strath.ac.uk/cs317c/docs/defaultProfilePicture.png' width='100' height='100'/>";
            } else {  
                //TODO
            }
        ?>
            
        <div class="buttons">
            <a href="login.php"><input type="submit" value="Log Out" id="logout"></a>
            <br><br><br>
            <a><input type="submit" value="Delete Account" id="delete"></a>
        </div>
            
          
            
    </body>
</html>
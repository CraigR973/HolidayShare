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
        /* Set the width of the side navigation to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
}
        </script>
    </head>
    <body>
        <span onclick="openNav()"><img src="docs/menu.png"></span><h1>Share</h1> 
        
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
          <a href="menu.php">Home</a>
          <a href="profile.php">My Profile</a>
          <a href="About.php">About</a>
          <a href="login.php">Log Out</a>
        </div>
            
        <form method="post" name="myform">
            
            <p class="login">
                Item Name <input type="text" name="name" id="username" placeholder="Name"><br><br>
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
        
        <div class="buttons">
            <a href="menu.php"><input type="submit" value="Back To Menu" id="buttons"></a>
            <br><br><br>
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
        
        $name = isset($_POST['name']) ? $conn-> real_escape_string($_POST['name']): "";
        $type = isset($_POST['type']) ? $conn-> real_escape_string($_POST['type']): "";
        $desc = isset($_POST['desc']) ? $conn-> real_escape_string($_POST['desc']): "";
        session_start();
        $uname = $_SESSION['username'];
        
        if(isset($_POST["Post"])){
            
            $sql = "INSERT INTO `Items` (`itemType`, `itemName`, `username`, `itemDescription`) VALUES  ('$type','$name','$uname','$desc')";
            
        }
        
        if($conn->query($sql) === TRUE){
            echo"<h3>Insert Sucessful</h3>";
        } else{
            die("Error on insert ".$conn->error);
        } 
        
        ?>
        
    </body>
</html>
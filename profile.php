
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
        
        <span onclick="openNav()"><img src="docs/menu.png"></span>
        <h1>Profile</h1> 
            <br><br>
        
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
          <a href="menu.php">Home</a>
          <a href="profile.php">Profile</a>
          <a href="About.php">About</a>
          <a href="login.php">Log Out</a>
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
            
      //      $userid = $conn->real_escape_string($_GET["id"]);
            
     //       $loginusername = $conn-> real_escape_string($_GET['username']);
           
        
            //issue query
            $sql = "SELECT * FROM `cs312r`.`Members`";
            $result = $conn ->query($sql);
            
            
            
            
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                   
                    echo "<p>".$row["username"]."</p>\n";
                }
            } else {
                die ("No matches");
            }
                    
                
             
            
            
                //close connection
                $conn ->close();
                
        ?>
            
        <div class="buttons">
            <a href="login.php"><input type="submit" value="Log Out" id="logout"></a>
            <br><br><br>
            <a><input type="submit" value="Delete Account" id="delete"></a>
        </div>
            
          
            
    </body>
</html>
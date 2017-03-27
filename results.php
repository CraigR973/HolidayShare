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
        
        <span onclick="openNav()"><img src="docs/menu.png"></span><h1>Results</h1> 
            <br><br>
        
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
          <a href="menu.php">Home</a>
          <a href="profile.php">My Profile</a>
          <a href="About.php">About</a>
          <a href="login.php">Log Out</a>
        </div>
            
            <?php

            session_start();
            $search = $_SESSION['search'];
            echo "<h1>$search</h1>";
            
            for($i=0; $i<5; $i++){
                $j = $i + 1;
                echo "
                <div class='results'>
                    <p>Result $j</p>
                </div>
                <br>
                ";
                
            }

                
            ?>
            
        <div class="buttons">
            <a href="find.php"><input type="submit" value="Back To Find" id="buttons"></a>
            <br><br><br>
        </div>
            
    </body>
</html>
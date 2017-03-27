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
        <span onclick="openNav()"><img src="docs/menu.png"></span><h1>Find</h1> 
            <br><br>
        
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
          <a href="menu.php">Home</a>
          <a href="profile.php">My Profile</a>
          <a href="About.php">About</a>
          <a href="login.php">Log Out</a>
        </div>
            
            <form method="post">
          <input type="text" name="text" id="search" placeholder="Search...">
          <br><br>
          <input type="submit" value="Search" name="Login" id="create">
        </form>
            
            <br><br><br>
            
        <div class="buttons">
            <a href="menu.php"><input type="submit" value="Back To Menu" id="buttons"></a>
            <br><br><br>
        </div>
            
            <?php
            
            $term = isset($_POST['text']);
            echo "$term";
            
            if(isset($_POST["Login"])){

                session_start();
                $_SESSION['searchterm'] = $term;
                header('Location: results.php');
                
            }
            
            ?>
            
    </body>
</html>
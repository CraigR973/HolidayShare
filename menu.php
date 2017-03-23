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
        <style>
           
        </style>
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
        
        <span onclick="openNav()"><img src="docs/menu.png"></span><h1>Home</h1>
            <br><br>
            <div class="buttons">
                <a href="find.php"><input type="submit" value="Find" id="buttons"></a>
                <br><br><br>
                <a href="share.php"><input type="submit" value="Share" id="buttons"></a>
            </div>
        
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
          <a href="menu.php">Home</a>
          <a href="profile.php">Profile</a>
          <a href="requests.php">Requests</a>
          <a href="About.php">About</a>
          <a>Log Out</a>
        </div>
        
    </body>
</html>
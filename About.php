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
        
        <span onclick="openNav()"><img src="docs/menu.png"></span><h1>About</h1> 
            <br><br>
        
            <p>Holiday Share is a sharing community allowing users to connect and share their holiday items that would otherwise gather dust for most of the year</p>
            <p>To request to borrow an item, select the "Find" option on th main menu and search for the item you're looking for</p>
            <p>To share an item, select the "Share" option on th main menu and make a post displaying the item you want to share</p>
            <br>
            <p>Happy Sharing!</p>
            
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
          <a href="menu.php">Home</a>
          <a href="profile.php">Profile</a>
          <a href="About.php">About</a>
          <a href="login.php">Log Out</a>
        </div>
    </body>
</html>
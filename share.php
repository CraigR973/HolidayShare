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
        <span onclick="openNav()"><img src="docs/menu.png"></span><h1>Share</h1> 
        
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
          <a href="menu.php">Home</a>
          <a href="profile.php">Profile</a>
          <a href="About.php">About</a>
          <a href="login.php">Log Out</a>
        </div>
            
        <form method="post" name="myform">
            
            <p class="login">
                Item Name <input type="text" name="username" id="username" placeholder="Name"><br><br>
                Item Type:<br><br>
                <select id="type" name="type">
                    <option value="suitcase">Suitcase</option>
                    <option value="Accessory">Accessory</option>
                    <option value="1">...</option>
                    <option value="2">...</option>
                </select>
                <br><br>
                Item Description:<br><br>
                <textarea placeholder="Description..."></textarea>
                <br><br>
                <input type="submit" value="Post" name="Post" id="login">
            </p>
            
        </form>
            
    </body>
</html>
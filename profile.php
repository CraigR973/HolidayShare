
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
            <a class="active"href="#"><i class="fa fa-user-o"></i><br/>My HS</a>
            <a href="find.php"><i class="fa fa-search"></i><br/>Search</a>

            <a href="About.php"><i class="fa fa-info"></i><br/>About</a>
            <a href="share.php"><i class="fa fa-share-alt"></i><br/>Share</a> 
        </div>

        <div class="main">

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
                die();
            }

            $picsql = "SELECT `ProfilePic` FROM `Members` WHERE `username` = '$memberusername' AND `ProfilePic` != 'null'";
            $picresult = $conn->query($picsql);
            $pic = $picresult->fetch_assoc();

            
            if($picresult->num_rows === 0 || !file_exists("docs/profilepictures/" . $pic['ProfilePic'])){
                echo "<div style='text-align: center;'><img src='https://devweb2016.cis.strath.ac.uk/cs317c/docs/defaultProfilePicture.png' width='100' height='100' class='proPic'/></div>";
            } else {                  
                foreach (glob("docs/profilepictures/*") as $p){
                    if($p == "docs/profilepictures/" . $pic['ProfilePic']){
                        echo "<div style='text-align: center;'><img src='https://devweb2016.cis.strath.ac.uk/cs317c/$p' width='100' height='100' class='proPic'/></div>"
                                . "<br><br>";

                    }
                }
            }
            ?>

            <h1>Your Details</h1><br>

            <?php
                $details_result = $conn->query("SELECT `email`, `phone` FROM `Members` WHERE `username` = '$memberusername'");
                $details = $details_result->fetch_assoc();
                $email = $details['email'];
                $phone = $details['phone'];

                echo "Email address: ".$email;
                echo "<br/>";
                echo "Phone Number: ".$phone;
            ?>

            <h1>Your Requests</h1><br>

            <?php
            //issue query
            $sql = "SELECT * FROM `requests` WHERE `requestuser` = '$memberusername'";
            $result = $conn->query($sql);


            if(!$result){
                die();
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $itemid = $row["itemid"];
                    $status = $row["status"];

                    //issue query
                    $sql2 = "SELECT * FROM `Items` WHERE `id` = '$itemid'";
                    $result2 = $conn->query($sql2);


                    if(!$result2){
                        die();

                    }

                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {

                            $itemname = $row["itemName"];
                            $itemdesc = $row["itemDescription"];
                        }
                    }


                    echo "
                    <div class='results'>
                        Item Name: $itemname <br>
                        Item Description: $itemdesc <br>
                    </div>
                    <br><br>
                    ";
                }
            }

            echo "<h1>Your Items</h1>";

            //issue query
            $sql3 = "SELECT * FROM `Items` WHERE `username` = '$memberusername'";
            $result3 = $conn->query($sql3);

            if (!$result3) {
                die("Query Failed " . $conn->error);
            }

            if ($result3->num_rows > 0) {
                
                while ($row = $result3->fetch_assoc()) {

                    $youritemid = $row["id"];
                    $yourdesc = $row["itemDescription"];
                    $youritemname = $row["itemName"];

                    //issue query
                    $sql4 = "SELECT * FROM `requests` WHERE `itemid` = '$youritemid'";
                    $result4 = $conn->query($sql4);

                    if (!$result4) {
                        die("Query Failed " . $conn->error);
                    }
                    $bool = false;
                    if ($result4->num_rows > 0) {
                        $bool = true;
                        while ($row = $result4->fetch_assoc()) {
                            $requester = $row["requestuser"];
                        }
                    }

                    //issue query
                    $sql5 = "SELECT * FROM `Members` WHERE `username` = '$requester'";
                    $result5 = $conn->query($sql5);

                    if (!$result5) {
                        die();
                        
                    }
                    
                    if ($result5->num_rows > 0) {
                        
                        while ($row = $result5->fetch_assoc()) {
                            $useremail = $row["email"];
                            $userphone = $row["phone"];
                        }
                    }



                    echo "
                    <div class='results'>
                        Item Name: $youritemname <br>
                        Description: $yourdesc <br>";

                    if ($bool === true) {

                        echo "This item has been requested! <br>
                         SMS: <a href='sms:$userphone'>Phone</a>
                        Email: <a href='mailto:$useremail' target='_blank'>Email</a>
                    ";
                    }

                    echo "</div><br><br>";
                }
            }



            //close connection
            $conn->close();
            ?>

            <div class="buttons">
                <br>
                <a href="welcome.php"><input type="submit" value="Log Out" id="logout"></a>
                <br><br><br>
                <a><input type="submit" value="Delete Account" id="delete"></a>
            </div>
        </div>

    </body>
</html>
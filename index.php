

<?php include 'db.php';?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { //if new message is being added
    $cleaned_message = preg_replace('/[^a-zA-Z0-9.\s]/', '', $_POST["message"]); //remove invalid chars from input.
    $strsq0 = "INSERT INTO MESSAGES_TABLE ( MESSAGE) VALUES ('" . $cleaned_message . "');"; //query to insert new message
    if ($mysqli->query($strsq0)) {
        //echo "Insert success!";
    } else {
        echo "Cannot insert into the data table; check whether the table is created, or the database is active. "  . mysqli_error();
    }
}

//Query the DB for messages
$strsql = "select * from MESSAGES_TABLE ORDER BY ID DESC limit 100";
if ($result = $mysqli->query($strsql)) {
   // printf("<br>Select returned %d rows.\n", $result->num_rows);
} else {
        //Could be many reasons, but most likely the table isn't created yet. init.php will create the table.
        echo "<b>Can't query the database, did you <a href = init.php>Create the table</a> yet?</b>";
    }
?>


?>
<!DOCTYPE html>
<html>

<head>
    <title>Twitter 2</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="loggedin">
<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
    <div class="">
        
        <h1>
					Twitter 2 
				</h1>
         <input type="button" class = "mybutton" onclick="window.location = 'init.php';" class="btn" value="Reset"></input></p>
            </br>
            <?php
    switch ($_GET["n"])
    {
    case "home" :
        $heading = "Home";
        $body = "Say what you have to say";
    case "login" :
        $heading = "Login";
        $body = "Login";
    break;
    case "profile" :
            $heading = "Design your profile";
            $body = "Edit your profile";
    break;
    case "donate" :
            $heading = "Donate";
            $body = "Donate and help us make the site better";
    break;
    case "logout" :
        $heading = "Log Out";
        $body = "Donate and help us make the site better";
    break;
    default:
            $heading = "Welcome";
            $body = "You've heard of Twitter well heres Twitter 2";
            break;
    }

    ?>
 
 
                <nav>
        <a href="index.php?n=home">Home</a> - 
        <a href="index.php?n=profile">Profile</a> -
        <a href="index.php?n=donate"> Donate</a> -
        <a href="index.php?n=donate>"> Login</a> -
		<a href="index.php?n=donate"> Register</a> -
       
        
        
    </nav>   
    <?php echo $body; ?>
    <section>
    <?php
        if ($_GET['n'] == 'home'){
                include("chatbox.php");
        } ?>
    <?php
        if ($_GET['n'] == 'login') {
            include("login.php");
        }
        ?>
    <?php 
        if ($_GET['n'] == 'profile'){
            include("profile.php");
        }
        ?>
   <?php 
        if ($_GET['n'] == 'register') {
            include("register.php");
        }
        ?>
    <?php
        if ($_GET['n'] == 'logout') {
            include("logout.php");
        }
    ?>
    </section>
   
   
    
</body>

</html>

<?php
require("CBHelper.php");

if(!$_POST) {

?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->

  </head>
  <body>
    <div class="span3 well" style="text-align:center">
    <legend>Command and Influence</legend>
    <form accept-charset="UTF-8" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input class="span3" name="firstname" placeholder="First Name" type="text">
    <input class="span3" name="lastname" placeholder="Last Name" type="text">
    <input class="span3" name="password" placeholder="Password" type="password">
    <button class="btn btn-warning" type="submit">Sign up!</button>
    </form>
    </div>

    <style>
      
        body {
          padding-top: 60px;
        }
      
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>
    <script src="bootstrap.js">
    </script>
    <script>

    </script>
  </body>
</html>
<?php

}
else {

include("secrets.php");
$helper = new CBHelper($appCode, $appSecret, $password);

$object = array("id" => hash("sha256", $_POST['firstname'] . $_POST['lastname'] . $_POST['password']),
"first_name" => $_POST['firstname'],
"last_name" => $_POST['lastname']);

$search = $helper->search_document("user", array("id" => hash("sha256", $_POST['firstname'] . $_POST['lastname'] . $_POST['password'])));
if(sizeof($search["message"]) != 0) {
	echo "User already exists";
}
else {
	$helper->insert_document($object, "user");
	exit("Success!");
}
}
?>
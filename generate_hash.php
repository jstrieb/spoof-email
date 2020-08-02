<!--
Created by Jacob Strieb
August 2020

See explanatory comment in PHP source.
-->
<html>
<head>
<meta name="author" content="God" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Email Sender</title>
<style>
html {
  padding: 2em;
}

body {
  display: block;
  margin: auto;
  padding: 4em;
  max-width: 66ch;
}

form {
  display: inline-block;
  width: 100%;
}

form input, form textarea, form label {
  width: 100%;
  max-width: 100%;
  min-width: 100%;
  box-sizing: border-box;
  margin: 1em;
}

form label {
  margin-bottom: 0;
}

form input, form textarea {
  margin-top: 0;
  padding: 0.25em;
  border-radius: 3px;
  border: 1px solid black;
}

textarea {
  height: 30ch;
}
</style>
</head>
<body>
<?php

/**
 * Created by Jacob Strieb
 * August 2020
 *
 * Generate a password hash to edit into index.php
 */


/* Uncomment if debugging */
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
var_dump($_REQUEST);
*/

if (isset($_REQUEST["password"])) {
  echo "<p>";
  echo password_hash(hash("sha256", $_REQUEST["password"]), PASSWORD_BCRYPT);
  echo "</p>";
} else {
  echo '
<form method="post">
<label for="password">Password:</label>
<input type="password" id="password" name="password" />
<input type="submit" value="Submit" />
</form>
';
}

?>
</body>
</html>

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
 * This code can be used to (poorly) spoof email messages. A user first uploads
 * this PHP file to their webserver. If they have sendmail set up, it will send
 * email messages to whomever, that appear to come from whomever, the user
 * desires.
 *
 * Personally, I prefer to use web hosts with a free tier that already have
 * sendmail support. One that I can recommend is 000webhost.com.
 */


/* Uncomment if debugging */
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
var_dump($_REQUEST);
*/

/* Generate a password hash using generate_hash.php and paste it here */
$expected_hash = '[ ENTER YOUR PASSWORD HASH HERE ]';
if (isset($_REQUEST["password"])
    && password_verify(hash("sha256", $_REQUEST["password"]), $expected_hash)) {
  echo "<p>Correct password.</p>";

  $to = $_REQUEST["to"];
  $subject = $_REQUEST["subject"];
  $from_name = $_REQUEST["from_name"];
  $from_email = $_REQUEST["from_email"];
  $headers = "Reply-To: $from_name <$from_email>
From: $from_name <$from_email>
Content-Type: text/html;
MIME-Version: 1.0";
  $message = $_REQUEST["email"];
  if (mail($to,$subject,$message,$headers)) {
    echo "<p>Mail successfully sent to $to.</p>";
  } else {
    echo "<p>Mail not sent to $to.</p>";
  }
} else if (isset($_REQUEST["password"])) {
  echo "<p>Incorrect password!</p>";
} else {
  echo '
<form method="post">
<label for="password">Password:</label>
<input type="password" id="password" name="password" />
<label for="to">To (email):</label>
<input type="email" id="to" name="to" />
<label for="from_name">From (name):</label>
<input id="from_name" name="from_name" />
<label for="from_email">From (email):</label>
<input type="email" id="from_email" name="from_email" />
<label for="subject">Subject:</label>
<input id="subject" name="subject" />
<label for="email">HTML Email:</label>
<textarea id="email" name="email"></textarea>
<input type="submit" value="Submit" />
</form>
';
}

?>
</body>
</html>

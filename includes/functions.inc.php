<?php

function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }
?>

<?php
function sanitize($input) {
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "aptech_blog";
$link = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysqli_real_escape_string($link, $input);
    }
    return $output;
}


// function sanitize($data){
// $host = "localhost";
// $username = "root";
// $password = "";
// $db = "aptech_blog";
// $link = mysqli_connect($host, $username, $password, $db);
// $data = trim($data);
// $data = stripslashes($data);
// $data = htmlspecialchars($data);
// $data = htmlentities($data);
// $data = mysqli_real_escape_string($link, $data);
// return $data;
// }

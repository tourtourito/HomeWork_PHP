<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hello Arthur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('header.html');
?>
<br>
<form action="friendbook.php" method="post">
    <input type="text" name="this_name">
    <input type="submit" name="envoi" value="Send">
    <input type="text" name="nameFilter" value="<?php if(empty($_POST['nameFilter'])) $nameFilter = NULL;?>">
    <input type="submit" name="filter" value="Filter">
</form>
<?php

include('footer.html');
echo "<h1>My best friend: </h1>";

$filename = "friends.txt";
$name = $_POST['this_name'];
$file = fopen( $filename, "a" );
if ("$name" != NULL) {
    fwrite( $file, "$name\n");
}

$file = fopen( $filename, "r" );
$nameFilter = $_POST['nameFilter'];
$file2 = fopen( $filename, "r" );
while (!feof($file)) {
    if ($nameFilter != NULL){
        if (strstr(fgets($file), "$nameFilter", false) != NULL){
            $ligne = fgets($file2)."<br/>";
            echo $ligne;
        }
        else {
            fgets($file2);
        }
    }
    else {
        echo fgets($file)."<br/>";
    }
}
?>

</body>
</html>


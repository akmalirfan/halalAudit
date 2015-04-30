<?php
$keys = array_keys($_POST);
for ($i = 0; $i < count($keys); $i++) {
    echo $keys[$i];
    echo "zzz\n";
}
//echo count($_POST);
    /*if (isset($_POST['submit'])) {
        echo "Submitted";
        var_dump($_POST);
    } else {
        echo "Not submitted";
    }*/
?>

<!--<!DOCTYPE HTML>
<html>
    <body>
        <form method="post">
            <input name="submit" type="submit" value="Submit"/>
        </form>
    </body>
</html>-->
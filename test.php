<?php
    if (isset($_GET)) {
        // var_dump($_GET);
        // echo '<hr /';
        echo($_GET['user']);
    }
?>

<html>

    <body>
        <button type="submit" onclick="location.href='test.php?fff'">TRY ME</button>
        <button type='submit' onclick="location.href='profile.php?user='<?php echo $_GET['user']; ?>'">HELP</button>
    </body>

</html
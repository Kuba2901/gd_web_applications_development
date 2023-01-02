<html>
    <body>
        <h1>Error</h1>
    </body>
    <?php 
        $code = $_GET['errorCode'];

        if ($code == 1) {
            echo "<p>Username already taken</p>";
        } else {
            echo "<p>Email already in use</p>";

        }
    ?>

</html>


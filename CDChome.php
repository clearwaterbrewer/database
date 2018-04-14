<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Database Home Page</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
            <p>
                Database
                <p><a href="CDCbatches.php">Batches</a></p>
                <p><a href="CDCWashRuns.php">Wash Runs</a></p>
		<br>******REPORTS BUTTON******
            </p>
	    <p><a href="includes/logout.php">logout</a></p>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>

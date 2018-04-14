<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Batches</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
            <p>
                Cotherman Distilling Co. <br>
		Last 5 Wash Runs 


		<?php
		$sql="SELECT * FROM (SELECT * FROM WashRuns ORDER BY DateTimeCode DESC LIMIT 5) sub ORDER BY DateTimeCode ASC";
		$result = $mysqli->query($sql);
		echo "<table>
		<tr>
		<th>Date1</th>
		<th>Batch</th>
		<th>Name</th>
		<th>Source Product</th>
		<th>Source Ingredient</th>
		</tr>";
		if ($result->num_rows > 0) {
		  while ($row = $result->fetch_assoc()) {
		    echo "<tr>";
		    echo "<td>" . $row['Date1'] . "</td>";
		    echo "<td>" . $row['BatchNum'] . "</td>";
		    echo "<td>" . $row['BatchName'] . "</td>";
		    echo "<td>" . $row['SourceProduct'] . "</td>";
		    echo "<td>" . $row['SourceIngredient'] . "</td>";
		    echo "</tr>";
		  }
		}
		echo "</table>";
		?>

		<br>******NEW Wash Run BUTTON******
            </p>
	    <p><a href="includes/logout.php">logout</a></p>
            <p>Return to <a href="CDChome.php">home page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>

<?php 
define("HOST", "localhost"); 
define("USER", "DBadmin"); 
define("PASSWORD", "qwer1234"); 
define("DATABASE", "CDCtest");

try{
    $dbh = new pdo( 'mysql:host='. HOST .';dbname='. DATABASE .', USER, PASSWORD,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}



?>

<!DOCTYPE HTML>
<html>
<head>
<title>CDC Wash Run Entry</title>
      <script src = includes/jquery.min.js></script>
</head>
<body>
	
<form id="WashForm">
<h1>CDC Wash Run Entry</h2>
<label Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
<label for="DateTimeCode">DateTimeCode</label>
<input name="DateTimeCode" value="<?php echo date('Y-m-d H:i:s'); ?>" required><br>
</form>
	
	
</body>
</html>

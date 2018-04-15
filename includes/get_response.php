<?php 
require_once("db_connect.php");
if((isset($_POST['BatchName'])&& $_POST['BatchName'] !='') 
{
 require_once("contact_mail.php<strong>");
</strong>
$BatchName = $conn->real_escape_string($_POST['BatchName']);
$Class = $conn->real_escape_string($_POST['Class']);
$SourceProduct = $conn->real_escape_string($_POST['SourceProduct']);
$SourceIngredient = $conn->real_escape_string($_POST['SourceIngredient']);

$sql="INSERT INTO Batches (BatchName, Class, SourceProduct, SourceIngredient) 
VALUES ('".$BatchName."','".$Class."', '".$SourceProduct."', '".$SourceIngredient."')";


if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Batch Added!";
}
}
else
{
echo "Please fill Batch name and Class";
}
?>

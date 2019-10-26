<?php
$servername = "localhost";
$dbusern = "distiller";
$dbpassw = "qwer1234"; 
$dbname = "CDCtest";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusern, $dbpassw);

$fileName = './RFB.csv';
$table = 'RemovedFromBond';
 
//Set the Content-Type and Content-Disposition headers to force the download.
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
 
 
//Create our SQL query.
$sql = "SELECT * FROM $table WHERE DateTimeCode between (CURDATE() - INTERVAL 1 MONTH ) and NOW() ";
 
//Prepare our SQL query.
$statement = $pdo->prepare($sql);
 
//Executre our SQL query.
$statement->execute();
 
//Fetch all of the rows from our MySQL table.
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
 
//Get the column names.
$columnNames = array();
if(!empty($rows)){
    //We only need to loop through the first row of our result
    //in order to collate the column names.
    $firstRow = $rows[0];
    foreach($firstRow as $colName => $val){
        $columnNames[] = $colName;
    }
}
 
 
//Open up a file pointer
$fp = fopen('php://output', 'w');

//Start off by writing the column names to the file.
fputcsv($fp, $columnNames);
 
//Then, loop through the rows and write them to the CSV file.
foreach ($rows as $row) {
    fputcsv($fp, $row);
}
 
//Close the file pointer.
fclose($fp);
?>

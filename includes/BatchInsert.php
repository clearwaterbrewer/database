<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
$error_msg = "";
if (isset($_POST['BatchName1'], $_POST['Class1'], $_POST['SourceProduct1'], $_POST['SourceIngredient1'])) {
    // Sanitize and validate the data passed in
    $BatchName = filter_input(INPUT_POST, 'BatchName1', FILTER_SANITIZE_STRING);
    $Class = filter_input(INPUT_POST, 'Class1', FILTER_SANITIZE_STRING);
    $SourceProduct = filter_input(INPUT_POST, 'SourceProduct1', FILTER_SANITIZE_STRING);
    $SourceIngredient = filter_input(INPUT_POST, 'SourceIngredient1', FILTER_SANITIZE_STRING);

    // Insert the new Batch into the database 
    if ($insert_stmt = $mysqli->prepare("INSERT INTO Batches (BatchName, Class, SourceProduct, SourceIngredient) VALUES (?, ?, ?, ?)")) {
        $insert_stmt->bind_param('ssss', $BatchName, $Class, $SourceProduct, $SourceIngredient);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                echo "Error at BatchInsert.php";
                exit();
            }
        }
        echo "Data Submitted succesfully";
        exit();
    }
}

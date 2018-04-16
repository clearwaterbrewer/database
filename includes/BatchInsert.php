<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
$error_msg = "";
if (isset($_POST['BatchName'], $_POST['Class'], $_POST['SourceProduct'], $_POST['SourceIngredient'])) {
    // Sanitize and validate the data passed in
    $BatchName = filter_input(INPUT_POST, 'BatchName', FILTER_SANITIZE_STRING);
    $Class = filter_input(INPUT_POST, 'Class', FILTER_SANITIZE_STRING);
    $SourceProduct = filter_input(INPUT_POST, 'SourceProduct', FILTER_SANITIZE_STRING);
    $SourceIngredient = filter_input(INPUT_POST, 'SourceIngredient', FILTER_SANITIZE_STRING);

    // Insert the new Batch into the database 
    if ($insert_stmt = $mysqli->prepare("INSERT INTO Batches (BatchName, Class, SourceProduct, SourceIngredient) VALUES (?, ?, ?, ?)")) {
        $insert_stmt->bind_param($BatchName, $Class, $SourceProduct, $SourceIngredient);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Batch addition failure: INSERT');
                exit();
            }
        }
        header('Location: ../CDCbatches.php');
        exit();
    }
}

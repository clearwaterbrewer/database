<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
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

<?php 
include_once 'includes/db_connect_PDO.php'; 
$db = new Database;
$db->prepare("SELECT BatchNum, BatchName FROM Batches");
$db->execute();
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
      <div>
        <label for='batch-name'>Batch Name</label>
        <input id="batch-name" name='BatchName' value="">
      </div>
      <div>
        <label for='SourceProduct'>Source Product</label>
        <input id="source-product" name='SourceProduct' value="">
      </div>
      <div>
        <label for='SourceIngredient'>Source Ingredient</label>
        <input id="source-ingredient" name='SourceIngredient' value="">
      </div>
</form>
	
	
<script>
    // monitor for changes in drop-down
    $(document).ready(function() {  // technically not necessary if script is at the bottom, but I do it out of habit

      $('#choose-batch').on('change', function() {
        retrieveIngredient( $(this).val() );
      })
    });

    // send batchNum via ajax
    function retrieveIngredient(batchNumber) {

      $.post(
        "CDC_Ajax_PDO.php",       // where to send data
        {batchNum: batchNumber},  // parameters to send {varname: value}
        function(result) {        // what to do with results
          if(result.message=='success') {
            populateForm(result.data);
          } else {
            alert ('oops, failed');
          }
        }
      );
    }

    // put results into page
    function populateForm(data) {
      $('#batch-name').val(data.BatchName);
      $('#source-product').val(data.SourceProduct);
      $('#source-ingredient').val(data.SourceIngredient);
    }
  </script>
</body>
</html>

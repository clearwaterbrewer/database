$(document).ready(function() {
  $("#submit").click(function() {
  var BatchName = $("#BatchName").val();
  var ClassType = $("#ClassType").val();
  var SourceProduct = $("#SourceProduct").val();
  var SourceIngredient = $("#SourceIngredient").val();
    $.post("../includes/BatchInsert.php", {
      BatchName1: BatchName,
      ClassType1: Class,
      SourceProduct1: SourceProduct,
      SourceIngredient1: SourceIngredient
      },
    function(data) {
      alert(data);
      $('#BatchForm')[0].reset(); // To reset form fields
      });
  });
});

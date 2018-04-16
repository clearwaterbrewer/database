$(document).ready(function() {
  $("#submit").click(function() {
  var BatchName = $("#BatchName").val();
  var Class = $("#Class").val();
  var SourceProduct = $("#SourceProduct").val();
  var SourceIngredient = $("#SourceIngredient").val();
  if (BatchName == '' || Class == '' || SourceProduct == '' || SourceIngredient == '') {
    alert("Insertion Failed Some Fields are Blank....!!");
    } 
  else {
    // Returns successful data submission message when the entered information is stored in database.
    $.post("BatchInsert.php", {
      BatchName1: BatchName,
      Class1: Class,
      SourceProduct1: SourceProduct,
      SourceIngredient1: SourceIngredient
      },
    function(data) {
      alert(data);
      $('#form')[0].reset(); // To reset form fields
      });
    }
  });
});

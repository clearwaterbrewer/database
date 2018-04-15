<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Batch Entry" >
<meta property="og:description" content="Please click the link to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Batch Entry</title>
<link type="text/css" rel="stylesheet" href="styles/main.css" />
<link type="text/css" rel="stylesheet" href="bootstrap.min.css" />
<style type="text/css" id="form-designer-style">
.form-label.form-label-auto { display: block; float: none; text-align: left; width: inherit; } 
</style>
<style>
#loading-img{display:none;}

.response_msg{
margin-top:10px;
font-size:13px;
background:#E5D669;
color:#ffffff;
width:250px;
padding:3px;
display:none;
}
</style>

</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
<form class="jotform-form" accept-charset="utf-8" id="BatchForm" name="batchform" action="" method="post">

<div class="form-all">
  <ul class="form-section page-section">
    <li id="cid_1" class="form-input-wide" data-type="control_head">
      <div class="form-header-group ">
        <div class="header-text httal htvam">
          <h1>CDC Batch Entry</h2>
          <label class="form-label form-label-top form-label-auto">Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
        </div>
      </div>
    </li>

    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="BatchName">Batch Name</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" name="BatchName" Placeholder="Rum 13" required>
        </div>
    </li>
 
    <li class="form-line" data-type="control_dropdown">
        <label class="form-label form-label-top form-label-auto" for="Class">Class</label>
        <div class="form-input-wide">
          <select required class="form-dropdown" name="Class" style="width:150px" data-component="dropdown">
            <option value="">  </option>
            <option value="Whiskey 160"> Whiskey 160</option>
            <option value="Rum"> Rum </option>
            <option value="Gin"> Gin </option>
            <option value="Vodka"> Vodka </option>
            <option value="Spirits 190"> Spirits 190 </option>
            <option value="Other"> Other </option>
          </select>
        </div>
    </li>
  
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="SourceProduct">Source Product</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" name="SourceProduct" Placeholder="Molasses" required>
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="SourceIngredient">Source Ingredient</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" name="SourceIngredient" Placeholder="Molasses" required>
        </div>
    </li>


    <li class="form-line" data-type="control_button">
        <div class="form-input-wide">
          <div style="margin-left:40px" class="form-buttons-wrapper">
            <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
          </div>
       </div>
    </li>
    <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:40px" class="form-buttons-wrapper">
            <a href="CDChome.php" >
              <button type="button" class="form-submit-button" >
                Home
              </button>
            </a>
        </div>
       </div>
    </li>
    <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:40px" class="form-buttons-wrapper">
            <a href="includes/logout.php">
              <button type="button" class="form-submit-button" >
                Logout
              </button>
            </a>
          </div>
        </div>
    </li>
  </ul>
</div>
       
<div class="response_msg"></div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#contact-form").on("submit",function(e){
e.preventDefault();
if($("#contact-form [name='BatchName']").val() === '')
 {$("#contact-form [name='BatchName']").css("border","1px solid red");}
else
{$("#loading-img").css("display","block");
  var sendData = $( this ).serialize();
  $.ajax({type: "POST", url: "includes/get_response.php", data: sendData, success: function(data){
    $("#loading-img").css("display","none");
    $(".response_msg").text(data);
    $(".response_msg").slideDown().fadeOut(3000);
    $("#contact-form").find("input[type=text], input[type=email], textarea").val("");
  }
});
}
});

$("#contact-form input").blur(function(){
var checkValue = $(this).val();
if(checkValue != '')
{
$(this).css("border","1px solid #eeeeee");
}
});
});
</script>
</form> 

  
<?php else : ?>
<form class="jotform-form" accept-charset="utf-8">
  <div class="form-all">
    <ul class="form-section page-section">        
      <li id="cid_1" class="form-input-wide" data-type="control_head">
        <div class="form-header-group ">
          <div class="header-text httal htvam">
            <h2 id="header_1" class="form-header" data-component="header">
              NOT AUTHORIZED
             </h2>
              <label class="form-label form-label-top form-label-auto">You must be an authorized user. </label>
          </div>
        </div>
      </li
    </ul>
    <ul class="form-section page-section">        
      <li class="form-line" data-type="control_text">
        <div class="form-input-wide">
          <div style="margin-left:40px" class="form-buttons-wrapper">
           <a href="index.php">
              <button type="button" class="form-submit-button" >
                Login
              </button>
            </a>
          </div>
        </div>
      </li>
    </ul>
  </div>
 </form>        
<?php endif; ?>
</body>
</html>



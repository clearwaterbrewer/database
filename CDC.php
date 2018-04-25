<!doctype html>
<html>
<head>
<title>CDC Home</title>
<script type="text/javascript">
var bDebug=0; // NOTE - set to 1 to see alert pop-ups with Sent and Received AJAX content

function SubmitMenuItem() {
 var xElement=document.getElementById("MenuItems");
 var iIndex=xElement.selectedIndex;
 document.getElementById("Results").innerHTML="";
 if(iIndex>0) CallAjax(xElement.options[iIndex].value,"");
}

function CallAjax(sAction,sParams) {
 var sSendString="Action="+sAction+"&Password="+document.getElementById("Password").value
  +"&UserName="+document.getElementById("UserName").value+sParams;
 xmlhttp=new XMLHttpRequest();
 xmlhttp.onreadystatechange=AjaxResponse;
 xmlhttp.open("POST","CDCAjax.php",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 if(bDebug) alert("Sending: "+sSendString);
 xmlhttp.send(sSendString);
}

function AjaxResponse() {
 if(xmlhttp.readyState==4 && xmlhttp.status==200) {
  var sAction,i,s,sInfo;
  s=xmlhttp.responseText;
  if(bDebug) alert("Received: "+s); // NOTDONE
  i=s.indexOf("|");
  sAction=s.substr(0,i);
  sInfo=s.substr(i+1);
  if(sAction=="Batches" || sAction=="ReceiveFermentables" || sAction=="Fermentations")
   document.getElementById("Results").innerHTML=sInfo;
  // NOTE - you can do different things for different Action responses - this is just an example
  else if(sAction=="AddBatch")
   alert(s); // NOTE - this might just be a Success/Fail of the add
  else
   alert(s); // if no recognized action, just display the returned message
 }
}

function AddBatch() {
 // NOTE - probably do some error checking - like are the fields empty
 var xElement,i,x=["BatchName","BatchClass","BatchSource"],sParams="";
 for(i=0;i<x.length;i++) {
  xElement=document.getElementById("Add"+x[i]);
  sParams+="&"+x[i]+"="+xElement.value;
  xElement.value="";
 }
 CallAjax("AddBatch",sParams);
}
</script>
<style>
 table { border-collapse:separate;border-spacing:20px 0 }
</style>
</head>
<body>
<h1 style="text-align:center">CDC Database</h1>
<!-- NOTE - in real life, take out the default values for UserName and Password -->
UserName: <input type="text" id="UserName" value="Nelson" style="width:100px"> &nbsp; &nbsp; &nbsp;
Password: <input type="text" id="Password" value="TESTING" style="width:100px"> &nbsp; &nbsp; &nbsp;
Select option: <select id="MenuItems">
 <option selected value="Home">Home</option>
 <option value="Batches">Batches</option>
 <option value="ReceiveFermentables">Receive Fermentables</option>
 <option value="Fermentations">Fermentations</option>
</select>
&nbsp; &nbsp; &nbsp; <input type="button" value="GO!" onclick="SubmitMenuItem()">
<br/><br/><br/><div id="Results"></div>
</body>
</html>

<html>
<head>
<script>
function showContainer(str) {
    if (str == "") {
        document.getElementById("txtMessage").innerHTML = "";
        return;
    } else { 
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtMessage").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","CDCAjax2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
function showHint(str_showHint) {
    if (str_showHint.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "CDCAjax2.php?r=" + str_showHint, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>
          <select name="ID" onchange="showContainer(this.value)">
  <option value="">Select a Container:</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  </select>


</form>
<br>
<div id="txtMessage"><b>Container info will be listed here...</b></div>

<br><br>
<p><b>Start typing a name in the input field below:</b></p>
<form> 
Container name: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>

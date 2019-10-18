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
          <?php
          $sql = "SELECT * FROM Containers ORDER by ContainerName DESC";
          $result = $mysqli->query($sql);
          echo "<select class='form-dropdown' required name='id' onchange='showContainer(this.value)'>";
          echo "<option value=''> Select a Container        </option>";
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] .  "'>" . $row['ContainerName'] .' - '. $row['ContainerVolume'] . "</option>";
          }
          echo "</select>";
          ?>

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

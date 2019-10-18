<?php
include_once 'includes/db_connect.php';
?>
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
        xmlhttp.open("GET","CDCAjax3.php?q="+str,true);
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
          echo "<select id='id' name='id' onchange='showContainer(this.value)'>";
          echo "<option value=''> Select a Container        </option>";
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] .  "'>" . $row['ContainerName'] .' - '. $row['ContainerVolume'] . "</option>";
          }
          echo "</select>";
    ?>



</form>
<br>
<div id="txtMessage"><b>Container info will be listed here...</b></div>

<br>
</body>
</html>

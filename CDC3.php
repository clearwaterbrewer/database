<?php
include_once 'includes/db_connect.php';
?>
<html>
<head>
<script>
function showBatch(str) {
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
        xmlhttp.open("GET","CDCAjax3.php?b="+str,true);
        xmlhttp.send();
    }
}
    
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

    <?php
          $sql = "SELECT * FROM Batches ORDER by BatchNum DESC";
          $result = $mysqli->query($sql);
          echo "<select id='BatchNum' name='BatchNum' onchange='showBatch(this.value)'>";
          echo "<option value=''> Select a Batch        </option>";
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['BatchNum'] .  "'>" . $row['BatchNum'] .' - '. $row['BatchName'] . "</option>";
          }
          echo "</select>";
    ?>


</form>
<br>
<div id="txtMessage"><b>Container info will be listed here...</b></div>

<br>
</body>
</html>

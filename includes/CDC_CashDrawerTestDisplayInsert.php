<html>
<body>

INSERT INTO DrawerCounts<br>
(DateTimeCode, Initials, CountOpen, bill_100, bill_50, bill_20, bill_10, bill_5, bill_1, coin_100, coin_25, coin_10, coin_5, coin_1, CountClose, CountDelta, POS_Amount, POS_Tip, POS_Due)<br>
VALUES 
(
"<?php echo $_POST["DateTimeCode"]; ?>", 
"<?php echo $_POST["Initials"]; ?>", 
<?php echo $_POST["CountOpen"]; ?>, 
<?php echo $_POST["bill_100"]; ?>, 
<?php echo $_POST["bill_50"]; ?>, 
<?php echo $_POST["bill_20"]; ?>, 
<?php echo $_POST["bill_10"]; ?>, 
<?php echo $_POST["bill_5"]; ?>, 
<?php echo $_POST["bill_1"]; ?>, 
<?php echo $_POST["coin_100"]; ?>, 
<?php echo $_POST["coin_25"]; ?>, 
<?php echo $_POST["coin_10"]; ?>, 
<?php echo $_POST["coin_5"]; ?>, 
<?php echo $_POST["coin_1"]; ?>, 
<?php echo $_POST["CountClose"]; ?>, 
<?php echo $_POST["CountDelta"]; ?>, 
<?php echo $_POST["POS_Amount"]; ?>, 
<?php echo $_POST["POS_Tip"]; ?>, 
<?php echo $_POST["POS_Due"]; ?> 
);<br><br>


</body>
</html>


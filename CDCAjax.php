<?php
date_default_timezone_set("America/New_York"); // NOTE - this is Eastern Time - or whatever
// NOTE - you might have your DB connection parameters here:  require "CDC_DB_Connect.php";
// NOTE - if you have much complexity, you might have some things used in multiple files here:  require "CDC_Global.php";

$sUserName=$_POST["UserName"];
$sPassword=$_POST["Password"];
$sAction=$_POST["Action"];

// NOTE - call function in CDC_DB_CONNECT to set up DB connection:  $dbc=ConnectToDB();

$sResponse=$sAction."|";
if($sPassword!="TESTING" || $sUserName!="Nelson") // NOTE - you can do a user DB lookup to get user rights (read-only, edit, god, for example)
 $sResponse="You are not worthy";
else if($sAction=="AddBatch") {
 $sBatchName=$_POST["BatchName"];
 $sBatchClass=$_POST["BatchClass"];
 $sBatchSource=$_POST["BatchSource"];
 // NOTE - do a DB insert into the Batches table (assuming that batch# is an Auto Increment) with these values
 $sResponse="DB Insert was successful"; // NOTE - you can base this message on the success/failure of the SQL INSERT
} else if($sAction=="Batches") {
 $sResponse.="<b>Add a batch:</b> &nbsp; &nbsp; &nbsp; "
  ."Name: <input type='text' style='width:100px' id='AddBatchName'> &nbsp; &nbsp; &nbsp; "
  ."Class: <input type='text' style='width:100px' id='AddBatchClass'> &nbsp; &nbsp; &nbsp; "
  ."Source Product: <input type='text' style='width:100px' id='AddBatchSource'> &nbsp; &nbsp; &nbsp; "
  ."<input type='button' value='Add Batch' onclick='AddBatch()'>";
 $sResponse.="<br/><br/><table><caption>Last 100 Batches</caption>"
  ."<tr><th>#</th><th>Name</th><th>Class</th><th>Source Product</th></tr>";
 // NOTE - this is just a copy of your textual data - you'd do the PHP DB lookup here and format appropriately
 $x=["1	n/a	Spirits 190+	Malt Wort"
  ,"2	n/a	Spirits 190+	Malt Wort"
  ,"3	n/a	Spirits 190+	Malt Wort"
  ,"4	TBBC Whiskey	Whisky -160	Malt Wort"
  ,"5	n/a	Whisky -160	Malt Wort"
  ,"6	n/a	Whisky -160	Malt Wort"
  ,"7	CT Whiskey	Whisky -160	Malt Wort"
  ,"8	BMBC Whiskey	Whisky -160	Malt Wort"
  ,"9	n/a	Spirits 190+	Malt Wort"
  ,"10	n/a	Spirits 190+	Malt Wort"
  ,"11	deBine Whiskey	Whisky -160	Malt Wort"
  ,"12	deBine Whiskey	Whisky -160	Malt Wort"
  ,"13	Half-Mine #3	Gin	Grain Neutral"
  ,"14	deBine Whiskey	Whisky -160	Malt Wort"
  ,"15	Half Mine #4	Gin	Grain Neutral"
  ,"16	Hello Pena #1	Vodka	Grain Neutral"
  ,"17	n/a	Spirits 190+	Malt Wort"
  ,"18	TBBC Whiskey	Whisky -160	Malt Wort"
  ,"19	n/a	Spirits 190+	Malt Wort"
  ,"20	CBC Whiskey	Whisky -160	Malt Wort"
  ,"21	CBC Whiskey	Whisky -160	Malt Wort"
  ,"22	BMBC Whiskey	Whisky -160	Malt Wort"
  ,"23	n/a	Spirits 190+	Malt Wort"
  ,"24	TBBC Whiskey	Whisky -160	Malt Wort"
  ,"25	TBWS Rye	Whisky -160	Rye Malt Wort"
  ,"26	HoB Whiskey	Whisky -160	Malt Wort"
  ,"27	Cotherman's Rye	Whisky -160	Rye Malt Wort"
  ,"28	RUM	Rum	Molasses"
  ,"29	Cotherman's WTF	Whisky -160	Stout Malt Wort"
  ,"30	PT RUM 06	Rum	Molasses"
  ,"31	PT Gold Rum	Rum	Molasses"
  ,"32	PT RUM 08	Rum	Molasses"
  ,"33	PT RUM 13	Rum	Molasses"
  ,"34	PT RUM 14	Rum	Molasses"
  ,"35	727 #10	Vodka	Grain Neutral"
  ,"36	Nuetral	Spirits 190+	Malt Wort"
  ,"37	Hello Pena	Vodka	Grain Neutral"
  ,"38	Half Mine	Gin	Grain Neutral"
  ,"39	PT RUM 15	Rum	Molasses"
  ,"40	Neutral	Spirits 190+	Malt Wort"
  ,"41	PT Spiced	Rum	PT Rum"
  ,"42	Half Mine	Gin	Grain Neutral"
  ,"43	HoB Whiskey	Whisky -160	Malt Wort"
  ,"44	PT Spiced Rum	Rum	PT Rum"
  ,"45	HoB Whiskey	Whisky -160	Malt Wort"
  ,"46	TBWS Rye #2	Whisky -160	Rye Malt Wort"
  ,"47	Graffiti	Whisky -160	7th Sun wort"
  ,"48	PT Rum 18	Rum	Molasses"
  ,"49	PT Rum 19	Rum	Molasses"
  ,"50	PT Rum 20	Rum	Molasses"
  ,"51	Hello Pena	Vodka	Grain Neutral"
  ,"52	PT Citrus Rum	Rum	PT Rum"
  ,"53	HoB Rye	Whisky -160	Rye Malt Wort"
  ,"54	Barrel Aged Gin	Gin	Gin"
  ,"55	Half Mine ATS	Gin	Grain Neutral"
  ,"57	PT Rum 21	Rum	Molasses"
  ,"58	PT Rum 22	Rum	Molasses"
  ,"59	PT Dark Rum	Rum	PT Rum 20"
  ,"60	Hello Pena	Vodka	Grain Neutral"
  ,"61	Gin Base	Gin	Grain Neutral"
  ,"62	PT Citrus Rum	Rum	PT Rum"];
 for($i=0;$i<count($x);$i++) {
  $x2=explode("\t",$x[$i]);
  $sResponse.="<tr><td>".$x2[0]."</td><td>".$x2[1]."</td><td>".$x2[2]."</td><td>".$x2[3]."</td></tr>";
 }
 $sResponse.="</table>";
} else if($sAction=="ReceiveFermentables") {
 $sResponse.="Receive Fermentables table lookup goes here";
} else if($sAction=="Fermentations") {
 $sResponse.="Fermentations table lookup goes here";
}

// NOTE - call function in CDC_DB_CONNECT to close DB connection:  CloseDB();
 echo $sResponse;
?>

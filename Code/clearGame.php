<?php
include("db_access.php");

$sql1 = "DELETE FROM modSignals";
$sql2 = "DELETE FROM modActions";
echo ".".$_GET["game"].".";
if ($_GET["all"] == "true") {
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result = $conn->query($sql1);
	echo $conn->error;
	$result = $conn->query($sql2);
	echo $conn->error;
	$conn->close();
} elseif ($_GET["game"] != "") {
	echo ".".$_GET["game"].".";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$clause = " WHERE game=\"".$_GET["game"]."\"";
	$result = $conn->query($sql1 . $clause);
	echo $conn->error;
	$result = $conn->query($sql2 . $clause);
	echo $conn->error;
	$conn->close();
}

?>

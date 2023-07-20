<?php
include("db_access.php");

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM modActions";

$result = $conn->query($sql);
header('Content-Type: text/csv; charset=utf-8');
echo "game,round,player,signal,action,reactionTime\n";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo $row["game"].",".$row["round"].",".$row["player"].",".$row["signalChoice"].",".$row["action"].",".$row["reactionTime"]."\n";
  }
}
$conn->close();

?>

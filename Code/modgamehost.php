<?php
include("db_access.php");


	if ($_POST["command"] == "sendSignal") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "INSERT INTO modSignals (game, round, player, signalChoice, reactionTime) VALUES ('";
		$sql .= $conn->real_escape_string($_POST["gameID"]);
		$sql .= "', ";
		$sql .= $conn->real_escape_string($_POST["round"]);
		$sql .= ", '";
		$sql .= $conn->real_escape_string($_POST["player"]);
		$sql .= "', ";
		$sql .= $conn->real_escape_string($_POST["signal"]);
		$sql .= ", ";
		$sql .= $conn->real_escape_string($_POST["reactionTime"]);
		$sql .= ")";
		$result = $conn->query($sql);
		echo $conn->error;
		$conn->close();
	} elseif ($_POST["command"] == "sendAction") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "INSERT INTO modActions (game, round, player, signalChoice, action, reactionTime) VALUES ('";
		$sql .= $conn->real_escape_string($_POST["gameID"]);
		$sql .= "', ";
		$sql .= $conn->real_escape_string($_POST["round"]);
		$sql .= ", '";
		$sql .= $conn->real_escape_string($_POST["player"]);
		$sql .= "', ";
		$sql .= $conn->real_escape_string($_POST["signal"]);
		$sql .= ", ";
		$sql .= $conn->real_escape_string($_POST["action"]);
		$sql .= ", ";
		$sql .= $conn->real_escape_string($_POST["reactionTime"]);
		$sql .= ")";
		$result = $conn->query($sql);
		echo $conn->error;
		$conn->close();
	} elseif ($_POST["command"] == "pollSignal") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT * FROM modSignals WHERE game=\"";
		$sql .= $conn->real_escape_string($_POST["gameID"]);
		$sql .= "\" AND round=";
		$sql .= $conn->real_escape_string($_POST["round"]) . ";";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["signalChoice"];
		} else {
			echo "-1";
		}
		$conn->close();
	} elseif ($_POST["command"] == "pollResult") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT * FROM modActions WHERE game=\"";
		$sql .= $conn->real_escape_string($_POST["gameID"]) . "\" AND round=";
		$sql .= $conn->real_escape_string($_POST["round"]) . " ORDER BY player;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo "[" . $row["action"];
			while($row = $result->fetch_assoc()) {
				echo "," . $row["action"];
			}
			echo "]";
		} else {
			echo "[]";
		}
		$conn->close();
	}

?>
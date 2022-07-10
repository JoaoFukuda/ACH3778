<?php
	function get_result($conn, $query, $types = null, $params = null) {
		$stmt = $conn->prepare($query);
		$stmt->bind_param($types, ...$params);

		if(!$stmt->execute()) return false;
		return $stmt->get_result();
	}

	$db_addr = "database";
	$db_user = "catalogoaberto";
	$db_pass = "catalogoaberto";
	$db_name = "catalogoaberto";

	$conn = new mysqli($db_addr, $db_user, $db_pass, $db_name);

	if ($conn->connect_error) {
		die("Erro de conexao com o banco de dados: " . $conn->connect_error);
	}
	$conn->set_charset("latin1");
?>

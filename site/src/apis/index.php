<!DOCTYPE html>
<html>
	<?php
		$title = "Lista de APIs";
		include("../template/head.php");
	?>
	<body>
		<?php include("../template/nav.php"); ?>
		<h1><?php echo $title; ?></h1>
		<?php
			$apis_per_page = 3;
			$page = 0;

			include("../database/db_connect.php");

			$results = $conn->query("SELECT id, title FROM api;");

			echo "<ul>";
			while ($row = $results->fetch_assoc()) {
				echo "<li><a href=\"/api?id=".$row["id"]."\">".$row["title"]."</li>";
			}
			echo "</ul>";

			$conn->close();
		?>
	</body>
</html>

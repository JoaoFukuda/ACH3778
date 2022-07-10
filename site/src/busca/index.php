<!DOCTYPE html>
<html>
	<?php
		$title = "Busca";
		include("../template/head.php");
	?>
	<body>
		<?php include("../template/nav.php"); ?>
		<h1><?php echo $title; ?></h1>
		<form method="get">
			Termo:
			<input type="text" name="title" <?php if (!empty($_GET["title"])) echo "value=\"".$_GET["title"]."\"";?>></input>
			Categoria:
			<select name="category">
				<option value="0"></option>
				<?php
					include("../database/db_connect.php");

					$results = $conn->query("SELECT * FROM category;");

					while ($row = $results->fetch_assoc()) {
						echo "<option value=\"".$row["id"]."\"";
						if (!empty($_GET["category"]) && $_GET["category"] == $row["id"])
							echo " selected";
						echo ">".$row["name"]."</option>";
					}
				?>
			</select>

			Formato:
			<select name="format">
				<option value="0"></option>
				<option value="1">JSON</option>
				<option value="2">XML</option>
				<option value="3">CSV</option>
			</select>

			Tecnologia (como obter os dados):
			<select name="technology">
				<option value="0"></option>
				<option value="1">RESTS</option>
				<option value="2">GraphQL</option>
				<option value="3">Download</option>
			</select><br>
			<input type="submit" value="Buscar"></input>
		</form>
		<?php
			$valid_query = false;

			$types = "";
			$params = array();

			$query = "SELECT id, title FROM api WHERE";

			if (!empty($_GET["category"]) && $_GET["category"] != 0) {
				if ($valid_query)
					$query .= " AND";
				$valid_query = true;

				$query .= " category_id = ?";
				$types .= "i";
				$params[] = $_GET["category"];
			}

			if (!empty($_GET["title"])) {
				if ($valid_query)
					$query .= " AND";
				$valid_query = true;

				$query .= " LOWER(title) LIKE LOWER(?)";
				$types .= "s";
				$params[] = "%".$_GET["title"]."%";
			}

			$query .= ";";

			if ($valid_query) {
				$results = get_result($conn, $query, $types, $params);

				echo "<ul>";
				while ($row = $results->fetch_assoc()) {
					echo "<li><a href=\"/api?id=".$row["id"]."\">".$row["title"]."</li>";
				}
				echo "</ul>";
			} else {
				echo "<p>Voce precisa filtrar sua busca</p>";
			}

			$conn->close();
		?>
	</body>
</html>

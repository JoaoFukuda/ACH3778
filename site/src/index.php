<!DOCTYPE html>
<html>
	<?php include("template/head.php"); ?>
	<body>
		<?php include("template/nav.php"); ?>
		<center>
			<h1>Catálogo Aberto</h1>
			<p>Aqui você encontra um catalogo de APIs que cobrem as seguintes categorias:</p>
			<ul id="categories">
				<?php
					include("database/db_connect.php");
					$query = "SELECT id, name FROM category;";
					$result = $conn->query($query);
					while($row = $result->fetch_assoc()) {
						echo "<li><a href=\"/busca?category=" . $row["id"] . "\">" . str_replace("_", "&nbsp;", $row["name"]) . "</a></li>";
					}
					$conn->close();
				?>
			</ul>
		</center>
	</body>
</html>

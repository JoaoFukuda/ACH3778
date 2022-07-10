<!DOCTYPE html>
<html>
	<?php
		$title = "Propor Citação";
		include("../../template/head.php");
	?>
	<body>
		<?php include("../../template/nav.php"); ?>
		<h1><?php echo $title; ?></h1>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				include("../../database/db_connect.php");

				echo "<p>Muito obrigado por contribuir, iremos analisar sua proposta em breve.</p>";
				echo "<p><a href=\"/api?id=".$_GET["id"]."\">Voltar para a API.</a></p>";
			}
			else {
				if (empty($_GET["id"])) { ?>
					<p>Voce precisa especificar uma API atraves do parametro 'id'</p>
				<?php } else {
					include("../../database/db_connect.php");

					$results = get_result($conn, "SELECT * FROM api WHERE id = ?;", "i", array($_GET["id"]));

					$api = $results->fetch_assoc();
					if (!$api)
						die("No API found with ID ".$_GET["id"]);

					$conn->close(); ?>

					<h2>Proponha uma citação para a API "<a href="/api?id=<?php echo $api["id"]; ?>"><?php echo $api["title"]; ?></a>"</h2>

					<form id="propose_citation" method="post">
						<input type="hidden" name="id" value="<?php echo $api["id"]; ?>">
						Título<br>
						<input type="text" name="title" autofocus><br>
						Link<br>
						<input type="text" name="url"><br><br>
						<input type="submit" value="propor">
					</form>

				<?php }
			} ?>
	</body>
</html>

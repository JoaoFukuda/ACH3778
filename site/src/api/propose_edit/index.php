<!DOCTYPE html>
<html>
	<?php
		$title = "Propor Edição";
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

					<h2>Proponha uma edição para a API "<a href="/api?id=<?php echo $api["id"]; ?>"><?php echo $api["title"]; ?></a>"</h2>

					<form id="edit_api" method="post">
						<?php
							echo "<input name=\"id\" type=\"hidden\" value=\"".$api["id"]."\">";

							echo "<h3>Título</h3>";
							echo "<input name=\"title\" type=\"text\" value=\"".$api["title"]."\">";

							echo "<h3>Link</h3>";
							echo "<input name=\"url\" type=\"text\" value=\"".$api["url"]."\">";

							echo "<h3>Para que serve</h3>";
							echo "<h4>O que tem nessa API e para que esses dados seriam usados?</h4><br>";
							echo "<textarea rows=7 cols=86 name=\"main_operations\">".$api["main_operations"]."</textarea>";

							echo "<h3>Como acessar os dados</h3>";
							echo "<h4>Como fazer para acessar esses dados?</h4><br>";
							echo "<textarea rows=7 cols=86 name=\"how_to\">".$api["how_to"]."</textarea>";

							echo "<h3>Exemplos de uso</h3>";
							echo "<h4>Alguns exemplos com parametros reais de como utilizar essa API.</h4><br>";
							echo "<textarea rows=7 cols=86 name=\"examples\">".$api["examples"]."</textarea>";

							echo "<h3>Controle de acesso</h3>";
							echo "<h4>Existe algum tipo de restrição ou controle para acessar esses dados?</h4><br>";
							echo "<textarea rows=7 cols=86 name=\"access_control\">".$api["access_control"]."</textarea>";
						?><br>
						<input type="submit" value="propor edição">
					</form>

				<?php }
			} ?>
	</body>
</html>

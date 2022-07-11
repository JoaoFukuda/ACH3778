<!DOCTYPE html>
<html>
	<?php
		$title = "API";
		include("../template/head.php");
	?>
	<body>
		<?php include("../template/nav.php"); ?>
		<h1><?php echo $title; ?></h1>
		<?php
			if (empty($_GET["id"])) { ?>
				<p>Voce precisa especificar uma API atraves do parametro 'id'</p>
			<?php } else {
				include("../database/db_connect.php");

				$results = get_result($conn, "SELECT * FROM api WHERE id = ?;", "i", array($_GET["id"]));

				$api = $results->fetch_assoc();
				if (!$api)
					die("No API found with ID ".$_GET["id"]);

				$conn->close(); ?>

				<div id="api_header">
					<h2><?php echo $api["title"]; ?></h2>

					<p><a href="<?php echo $api["url"]; ?>" target="_blank">link externo</a></p>
				</div>

				<p id="last_update">Ultima edição: <?php
					$time = strtotime($api["last_update"]);
					echo date('D, d M Y', $time);
				?></p>

				<?php if (!empty($api["main_operations"])) { ?>
					<hr>
					<div>
						<h3 title="O que tem nessa API e para que esses dados seriam usados?">Para que serve</h3>
						<?php echo $api["main_operations"]; ?>
					</div>
				<?php } ?>

				<?php if (!empty($api["how_to"])) { ?>
					<hr>
					<div>
						<h3 title="Como fazer para acessar esses dados?">Como acessar os dados</h3>
						<?php echo $api["how_to"]; ?>
					</div>
				<?php } ?>

				<?php if (!empty($api["examples"])) { ?>
					<hr>
					<div>
						<h3 title="Alguns exemplos com parametros reais de como utilizar essa API.">Exemplos de uso</h3>
						<?php echo $api["examples"]; ?>
					</div>
				<?php } ?>

				<?php if (!empty($api["access_control"])) { ?>
					<hr>
					<div>
						<h3 title="Existe algum tipo de restrição ou controle para acessar esses dados?">Controle de acesso</h3>
						<?php echo $api["access_control"]; ?>
					</div>
				<?php } ?>

				<footer>
					<p>Tem ou conhece algum recurso externo que cite esta API? <a href="/api/propose_cit?id=<?php echo $api["id"]; ?>">Proponha uma citação.</a></p>
					<p>Achou algo estranho, está faltando alguma informação ou tem alguma outra ideia para o texto atual da API? <a href="/api/propose_edit?id=<?php echo $api["id"]; ?>">Proponha uma edição.</a></p>
				</footer>

			<?php } ?>
	</body>
</html>

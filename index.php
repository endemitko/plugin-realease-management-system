<?php

require "ServiceLocator.php";

DEFINE("BASE_DIR", __DIR__);

$serviceLocator = new ServiceLocator();

$files = $serviceLocator->getModLoader();

$versions = $files->get();


?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Michal Hojgr & Patrik Beneš" />
		<title>Čarovný minecraft</title>
	</head>
	<body>
		<h1>Carovny minecraft</h1>

		<h2>Posledni verze: <?php echo $versions["latest"]; ?></h2>

		<h3>Dalsi verze</h3>

		<ol>
			<?php foreach($versions["others"] as $version): ?>

				<li><?php echo $version; ?></li>

			<?php endforeach; ?>
		</ol>
	</body>
</html>
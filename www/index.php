<?php

use app\core\ServiceLocator;

DEFINE("BASE_DIR", __DIR__ . "/../");

require BASE_DIR . "/app/core/ServiceLocator.php";

$serviceLocator = new ServiceLocator();

$files = $serviceLocator->getModLoader();

$versions = $files->getVersions();
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Michal Hojgr & Patrik Beneš" />
		<title>Čarovný minecraft</title>
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
    <div class="header">
        <div class="logo"> </div>
        <h4>Posledni verze: <?php echo $versions["latest"]; ?></h4>  <a href=""><div class="button">DOWNLOAD</div> </a>
    </div>

		<h1>Carovny minecraft</h1>



		<h3>Dalsi verze</h3>

		<ol>
			<?php foreach($versions["others"] as $version): ?>

				<li><?php echo $version; ?></li>

			<?php endforeach; ?>
		</ol>
	</body>
</html>
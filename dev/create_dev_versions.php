<?php


function make_dev_versions() {
    $name =  "../versions/versions-test-" . rand(0, 3) . "." . rand(0, 3) . "." . rand(0, 3) . ".txt";
	file_put_contents($name, "");
	echo $name . "\n";
}

for($i = 0; $i < 10; $i ++) {
	make_dev_versions();
}
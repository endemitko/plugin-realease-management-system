<?php
function make_dev_versions() {
	file_put_contents("../versions/versions-test-" . rand(0, 3) . "." . rand(0, 3) . "." . rand(0, 3) . ".", "");
}

for($i = 0; $i < 10; $i ++) {
	make_dev_versions();
}
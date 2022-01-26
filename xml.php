<?php

$xml = simplexml_load_file("snacks.xml") or die ("Error: Cannot create object");

echo "<pre>";

foreach ($xml->childern) {
	# code...
}
?>
<?php

require_once __DIR__ . '/counter_store.php';

$counterFile = counterFilePath();
ensureCounterStorage($counterFile);

$content = file_get_contents($counterFile);
$file = fopen($counterFile, 'w+');
if(empty($content)) {
	$content = [
		'views' => 0,
		'clients' => [],
	];
} else {
	$content = json_decode($content, true);
}

$content['views'] = $content['views'] + 1;
if (!array_key_exists($_SERVER['REMOTE_ADDR'], $content['clients'])) {
	$content['clients'][$_SERVER['REMOTE_ADDR']] = 0;
}

$content['clients'][$_SERVER['REMOTE_ADDR']] = $content['clients'][$_SERVER['REMOTE_ADDR']] + 1;
fwrite($file, json_encode($content));
fclose($file);

header("Location: https://mssg.me/spaceag");
die();

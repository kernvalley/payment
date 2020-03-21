<?php
set_include_path(dirname(__DIR__, 2));
spl_autoload_register('spl_autoload');
header('Content-Type: application/json');

$data = Data::loadFromJSONFile('response.json');
$resp = new \KernValley\Payment\Response($data);
echo json_encode($resp, JSON_PRETTY_PRINT);

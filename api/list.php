<?php
header('Content-Type: application/json');
require_once '../config.php';

$search = $_GET['search'] ?? '';
$results = [];

foreach (['php', 'html', 'css', 'js'] as $type) {
    $files = glob("../libraries/$type/*.$type");
    foreach ($files as $file) {
        $name = basename($file, ".$type");
        if ($search && stripos($name, $search) === false) continue;
        
        $results[] = [
            'name' => $name,
            'type' => $type,
            'url' => BASE_URL . "/libraries/$type/" . basename($file)
        ];
    }
}

echo json_encode($results);
?>

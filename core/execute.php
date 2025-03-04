<?php
header('Content-Type: application/json');
require_once 'translate.php';

$data = json_decode(file_get_contents('php://input'), true);
$code = $data['code'] ?? '';
$language = $data['language'] ?? 'php';

// ترجمه کد به انگلیسی
$translatedCode = translateCode($code, $language);

// اجرا بر اساس زبان
switch ($language) {
    case 'php':
        ob_start();
        eval($translatedCode);
        $output = ob_get_clean();
        break;
        
    case 'html':
        $output = $translatedCode;
        break;
        
    case 'css':
        $output = "<style>$translatedCode</style>";
        break;
        
    case 'js':
        $output = "<script>$translatedCode</script>";
        break;
        
    default:
        $output = "زبان پشتیبانی نمی‌شود!";
}

echo json_encode(['output' => $output]);
?>

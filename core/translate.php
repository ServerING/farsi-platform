<?php
function translateCode($code, $language) {
    $dictionary = [
        'php' => [
            'چاپ' => 'echo',
            'تابع' => 'function',
            'اگر' => 'if',
            // ...
        ],
        'html' => [
            'سربرگ' => 'header',
            'بدنه' => 'body',
            // ...
        ],
        'css' => [
            'پس‌زمینه' => 'background',
            'رنگ' => 'color',
            // ...
        ],
        'js' => [
            'تابع' => 'function',
            'ثابت' => 'const',
            // ...
        ]
    ];
    
    return strtr($code, $dictionary[$language] ?? []);
}
?>

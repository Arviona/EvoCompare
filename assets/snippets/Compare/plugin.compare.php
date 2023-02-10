<?php

$compareMaxCountMsg = [
    'en' => 'You can only compare up to '.$compareMaxCount.' products at a time. Please remove a product from the comparison list to add a new one.',
    'ru' => 'Вы можете сравнивать не более '.$compareMaxCount.' товаров одновременно. Пожалуйста, удалите товар из сравнения и добавьте другой.',
];

if($modx->event->name==='OnPageNotFound') {
    // Render Compare table with products
    if(isset($_GET['q']) && $_GET['q'] == 'compare-list-render') {
        $requiredParams = [
            'idType' => 'documents',
            'documents' => $_COOKIE['compare_list'],
            'display' => $compareMaxCount,
        ];

        $result = $modx->runSnippet('DocLister', array_merge($requiredParams, $params));
        echo $modx->parseDocumentSource($result);
        die();
    }
} elseif($modx->event->name==='OnWebPageInit') {
    // Load Scripts and compareMaxCount value
    $modx->regClientScript('<script>const compareMaxCount = '.$compareMaxCount.';</script>');
    $modx->regClientScript('<script>const compareMaxCountMsg = "'.$compareMaxCountMsg['ru'].'";</script>');
    $modx->regClientScript('assets/snippets/Compare/compare.js');
}

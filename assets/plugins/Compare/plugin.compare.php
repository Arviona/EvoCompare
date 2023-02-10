<?php
$maxCount = 5;

if( isset($_GET['q']) && $_GET['q'] == 'compare-list-render') {
    $params = [
        'idType' => 'documents',
        'documents' => $_COOKIE['compare_list'],
        'ownerTPL' => '@CODE:
            <div class="row page-block__grid mb-4">
                [+dl.wrap+]
            </div><!--/.row-->',
        'tpl' => 'tovar',
        'tvList' => 'new,hit,nalich,vid,nazv,tol,dlina,shir,color,material,tekstura,plotn,razm,q_complect,price',
        'sortBy' => 'menuindex',
        'sortOrder' => 'DESC',
        'display' => $maxCount,
        'prepare' => 'Tovar_picture,Tovar_labels,Tovar_data',
        'debug' => 0,
    ];
    
    $result = $modx->runSnippet('DocLister', $params);
    echo $modx->parseDocumentSource($result);
    die();
}
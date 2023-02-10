<?php
/**
 * ComparePlugin 
 * Сравнение товаров
 * 
 * @category    plugin
 * @version     1.0
 * @author      Aharito (https://aharito.ru)
 * @internal    @properties &maxCount=Max products;text;5 &tvList=DocLister tvList;text;new,hit,nalich,vid,nazv,tol,dlina,shir,color,material,tekstura,plotn,razm,q_complect,price &sortBy=sortBy;text;menuindex &sortOrder=sortOrder activity;text;DESC;No &prepare=DocLister prepare;text;Tovar_picture,Tovar_labels,Tovar_data
 * @internal    @events OnPageNotFound
 * @internal    @modx_category Compare
 * @internal    @disabled 0
**/

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

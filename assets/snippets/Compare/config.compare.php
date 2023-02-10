<?php

// Здесь задайте макс. кол-во товаров в сравнении
$compareMaxCount = 5;

// Здесь задайте остальные параметры по правилам ДокЛистера, применимы все параметры ДокЛистера
// (!) Список ниже - это пример, вы можете одни параметры удалить, вторые помеянть, а третьи добавить
$params = [
    'ownerTPL' => '@CODE:
        <div class="row page-block__grid mb-4">
            [+dl.wrap+]
        </div>',
    'tpl' => 'tovar',
    'tvList' => 'new,hit,nalich,vid,nazv,tol,dlina,shir,color,material,tekstura,plotn,razm,q_complect,price',
    'sortBy' => 'menuindex',
    'sortOrder' => 'DESC',
    'prepare' => 'Tovar_picture,Tovar_labels,Tovar_data',
    'debug' => 0,
];
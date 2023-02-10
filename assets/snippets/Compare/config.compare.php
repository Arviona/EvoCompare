<?php

// Здесь задайте макс. кол-во товаров в сравнении
$compareMaxCount = 5;

// Добавлять фразы для кнопки сравнения? (0|1). Если 0, то к кнопке добавляется только класс.
$comparePhrases = 1;

// Фразы для кнопки сравнения. Актуальны, только если предыдущее установлено в 1.
$comparePhraseAdd = 'Сравнить';
$comparePhraseRemove = 'Убрать из сравнения';

// Класс активности
$compareActiveClass = 'active';

// Здесь задайте остальные параметры по правилам ДокЛистера, применимы все параметры ДокЛистера
// (!) Список ниже - это пример, вы можете одни параметры удалить, вторые помеянть, а третьи добавить
$params = [
    'ownerTPL' => '@CODE:
        <div class="row page-block__grid mb-4">
            [+dl.wrap+]
        </div>',
    'tpl' => 'tovar',
    'tvList' => 'dlina,shir,color,material,tekstura,plotn,price',
    'sortBy' => 'menuindex',
    'sortOrder' => 'DESC',
    'prepare' => '',
    'debug' => 0,
];

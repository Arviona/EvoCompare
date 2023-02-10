//<?php
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

require MODX_BASE_PATH.'assets/components/Compare/plugin.compare.php';

###Что входит
В дополнение входят JS-файл compare.js и плагин. Плагин просто создать в админке? включить и поставить событие OnPageNotFound. JS-файл скопировать в аппку сайта и подключить по ссылке без разницы где, но лучше где-нибудь около закрывающего body.

##1. Верстка для Товаров

В каждой "плитке" товара в Каталоге, а также на отдельных Страницах товара, нужно вписать HTML-код элемента (кнопки или ссылки) для добавления к сравнению и удаления из него.

Сам тег элемента может быть любой, у него могут быть любые классы и т.д.

Но есть три обязательных атрибута: data-role='compareButton', data-action='addToCompareList' и data-id со значением ИД товара.

###Пример кнопки (для ДокЛистера):
<span class="btn btn_sm btn_compare" data-role="compareButton" data-action="addToCompareList" data-id="[+id+]">
Сравнить
</span>

###Другой пример кнопки (для Страницы товара):
<div class="btn btn_lg btn_compare" data-role="compareButton" data-action="addToCompareList" data-id="[*id*]">
Сравнить
</div>

Когда товар добавлен к сравнению, у кнопки появляется класс "compareButton_active", он предназначен для оформления кнопки.

##2. Отдельная Страница сравнения

Таблица Сравнения на этой странице вставляется Аяксом внутрь тега с атибутом data-role="compareTable", поэтому в разметке страницы для Таблицы сравнения должен быть тег-обертка с этим атрибутом.

###Пример тега-обертки для Таблицы сравнения
<div data-role="compareTable" class="tovary page-block"></div>

##3. Счетчик

Счетчик - любой тег с обязательными атрибутами data-role="compareCountWrap" для обертки и data-role="compareCount" для внутреннего. Число вставляется во внутренний тег.

Когда кол-во ненулевое, к обертке добавляется класс "compareCountWrap_active". К внутреннему тегу добавится класс "compareCount_active".

###Пример тега для счетчика
<div data-role="compareCountWrap">
    <span data-role="compareCount"></span>
</div>

##4. Очистить сравнение

Тег кнопки очистки всего сравнения должен иметь атрибуты data-role="compareButton" и data-action="clearCompareData".

###Пример тега очистки
<div class="btn btn-danger btn-md" data-role="compareButton" data-action="clearCompareData">Очистить сравнение</div>
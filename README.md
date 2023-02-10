## Что входит
В дополнение входят JS-файл compare.js и плагин Compare. Если ставите вручную, плагин нужно просто создать в админке, назвать например Compare, включить и поставить событие OnPageNotFound.

JS-файл скопировать в папку сайта и подключить по ссылке без разницы где, но лучше где-нибудь около закрывающего body.
```
<script src="assets/plugins/Compare/compare.js"></script>
```

### 1. Верстка для Товаров

В каждой "плитке" товара в Каталоге, а также на отдельных Страницах товара, нужно вписать HTML-код элемента (кнопки или ссылки) для добавления к сравнению и удаления из него. Сам тег элемента может быть любой, у него могут быть любые классы и т.д.

Но есть три обязательных атрибута: `data-role="compareButton"`, `data-action="addToCompareList"` и data-id со значением ИД товара, например `data-id="[+id+]"`/

#### Пример кнопки (для ДокЛистера):
```
<span class="btn btn_sm btn_compare" data-role="compareButton" data-action="addToCompareList" data-id="[+id+]">
   Сравнить
</span>
```

#### Другой пример кнопки (для Страницы товара):
```
<div class="btn btn_lg btn_compare" data-role="compareButton" data-action="addToCompareList" data-id="[*id*]">
   Сравнить
</div>
```

Когда товар добавлен к сравнению, у кнопки появляется класс `compareButton_active`, он предназначен для оформления кнопки.

### 2. Отдельная Страница сравнения

В разметке страницы для Таблицы сравнения обязательно должен быть тег-обертка с атрибутом `data-role="compareTable"`. Таблица cравнения на странице сравнения будет вставляться Аяксом внутрь этого тега. 

#### Пример тега-обертки для Таблицы сравнения
```
<div data-role="compareTable" class="tovary page-block"></div>
```

### 3. Счетчик

Счетчик - любой тег с обязательными атрибутами `data-role="compareCountWrap"` для обертки счетчика и `data-role="compareCount"` для вставки самого числа. Число вставляется в этот внутренний тег.

#### Пример тега для счетчика
```
<div data-role="compareCountWrap">
    <span data-role="compareCount"></span>
</div>
```

Когда кол-во ненулевое, к обертке будет добавляться класс `compareCountWrap_active`. К внутреннему тегу добавится класс `compareCount_active`.

### 4. Очистить сравнение

Тег кнопки очистки всего сравнения должен иметь атрибут `data-role="compareClearButton"`.

#### Пример тега очистки
```
<div class="btn btn-danger btn-md" data-role="compareButton" data-action="clearCompareData">Очистить сравнение</div>
```

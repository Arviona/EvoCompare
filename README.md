## Что входит
В дополнение EvoCompare входят файлы `assets/snippets/Compare/compare.js`, `assets/snippets/Compare/plugin.compare.php` и `assets/snippets/Compare/plugin.compare.php`, а также плагин Compare для админки.

Устанавливайте архивом через Экстрас - всё должно создаться и настроиться само. Делалось и тестировалось для 1.4, про работоспособность на 3.х не знаю ничего.

### 1. Параметры и шаблоны

Задаются в файле `assets/snippets/Compare/config.compare.php`, там отредактируйте и поставьте свои параметры, шаблоны, tvList, сортировку и т.д. Все параметры и шаблоны как у ДокЛистера.

### 2. Верстка для Товаров

В каждой "плитке" товара в Каталоге, а также на отдельных Страницах товара, нужно вписать HTML-код для добавления к сравнению. Сам тег элемента может быть любой, у него могут быть любые классы и т.д.

Но должны быть три обязательных атрибута: `data-role="compareButton"`, `data-action="addToCompareList"` и data-id со значением ИД товара, например `data-id="[+id+]"`

#### Пример для каталога (шаблон ДокЛистер)
```
<span class="btn btn_sm btn_compare" data-role="compareButton" data-action="addToCompareList" data-id="[+id+]">
   Сравнить
</span>
```

#### Другой пример (для Страницы товара, поэтому `[*id*]` вместо `[+id+]`)
```
<div class="btn btn_lg btn_compare" data-role="compareButton" data-action="addToCompareList" data-id="[*id*]">
   Сравнить
</div>
```

Когда товар добавлен к сравнению, у элемента появляется класс `compareButton_active`, он предназначен для оформления.

### 2. Таблица сравнения

В разметке для Таблицы сравнения обязательно должен быть тег-обертка с атрибутом `data-role="compareTable"`. Таблица cравнения будет вставляться Аяксом внутрь этого тега. 

#### Пример тега-обертки для Таблицы сравнения
```
<div data-role="compareTable" class="tovary page-block"></div>
```

### 3. Счетчик

Счетчик - любой тег с обязательными атрибутами `data-role="compareCountWrap"` для обертки счетчика и `data-role="compareCount"` для самого числа. Число вставляется в этот внутренний тег.

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
<div class="btn btn-danger btn-md" data-role="compareClearButton">Очистить сравнение</div>
```

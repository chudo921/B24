 <?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Currency\CurrencyTable;

Loc::loadMessages(__FILE__);

$currencyValues = [];

if (Loader::includeModule('currency')) {
    $currencies = CurrencyTable::getList([
        'select' => ['CURRENCY'],
        'order' => ['SORT' => 'ASC'],
    ]);

    while ($currency = $currencies->fetch()) {
        $currencyValues[$currency['CURRENCY']] = $currency['CURRENCY'];
    }
}

$arComponentParameters = [
    'PARAMETERS' => [
        'CURRENCY' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('OTUS_CURRENCY_RATE_CURRENCY'),
            'TYPE' => 'LIST',
            'VALUES' => $currencyValues,
            'DEFAULT' => 'RUB',
        ],
    ],
];

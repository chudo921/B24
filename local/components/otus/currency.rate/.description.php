<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = [
    'NAME' => Loc::getMessage('OTUS_CURRENCY_RATE_NAME'),
    'DESCRIPTION' => Loc::getMessage('OTUS_CURRENCY_RATE_DESCRIPTION'),
    'PATH' => [
        'ID' => 'otus',
        'NAME' => Loc::getMessage('OTUS_CURRENCY_RATE_PATH_NAME'),
    ],
];

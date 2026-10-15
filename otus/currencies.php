
<?php

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->IncludeComponent(
    'otus:currency.rate',
    '.default',
    [
        'CURRENCY' => 'EUR',
    ]
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');

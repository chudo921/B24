<?php
declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use Bitrix\Main\Diag\Logger;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$logger = Logger::create('otus.logger');

$currentDateTime = date('Y-m-d H:i:s');

$logger->info(Loc::getMessage('OTUS_LOG_DATETIME'), [
    'datetime' => $currentDateTime,
]);

echo "Запись в лог выполнена! Проверьте файл: /local/logs/otus.log";
echo "<br>Время записи: " . $currentDateTime;
<?php
declare(strict_types=1);

use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses(null, [
    'Otus\Logger'        => '/local/classes/Otus/Logger.php',
    'Otus\LogFormatter'  => '/local/classes/Otus/LogFormatter.php',
]);
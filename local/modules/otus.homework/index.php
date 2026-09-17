<?php

// Подключил пролог битрикса 

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");



// Подключил класс логгера

require_once __DIR__ . '/OtuLogger.php';



// Создал экземпляр логгера

$logger = new \Otus\Homework\OtuLogger($_SERVER["DOCUMENT_ROOT"] . "/otus_custom.log");



// Лог сообщение

$logger->info("Текущая дата и время: " . date('Y-m-d H:i:s'));



echo "Запись в лог";

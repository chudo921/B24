<?php



namespace Otus\Homework;



use Bitrix\Main\Diag\FileLogger;


class OtuLogger extends FileLogger

{

    public function log($level, string|\Stringable $message, array $context = []): void

    {

        $newMessage = "OTUS: " . $message;

        parent::log($level, $newMessage, $context);

    }

}

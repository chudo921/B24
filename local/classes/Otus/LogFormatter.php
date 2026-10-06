<?php
declare(strict_types=1);

namespace Otus;

use Bitrix\Main\Diag\LogFormatterInterface;

class LogFormatter implements LogFormatterInterface
{

    public function format($message, array $context = []): string
    {
        $date = $context['date'] ?? date('Y-m-d H:i:s');

        $message = preg_replace_callback(
            '/\{([a-zA-Z0-9_.]+)\}/',
            static fn($m) => $context[$m[1]] ?? $m[0],
            $message
        );

        return "OTUS [{$date}] {$message}" . PHP_EOL;
    }
}

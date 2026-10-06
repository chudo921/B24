<?php
declare(strict_types=1);

namespace Otus;

use Bitrix\Main\Diag\FileLogger;

class Logger extends FileLogger
{
    public function __construct(string $filePath, int $maxLogSize = 1000000)
    {
        parent::__construct($filePath, $maxLogSize);
        $this->setFormatter(new LogFormatter());
    }
}

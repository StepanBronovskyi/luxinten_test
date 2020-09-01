<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 31.08.2020
 * Time: 21:33
 */

namespace Luxinten\TechnicalTaskUnit\Logger;

use Magento\Framework\Logger\Handler\Base,
    Monolog\Logger;

class Handler extends Base
{
    protected $loggerType = Logger::INFO;

    protected $fileName = '/var/log/test/unit.log';
}
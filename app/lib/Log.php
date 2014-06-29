<?php

/*
 * This file is part of the Telegramm package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Telegramm;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class Log
 * Adapter for PSR-3 Logger
 *
 * @author WN
 * @package Telegramm
 */
class Log
{
    /**
     * @var \Telegramm\Log
     */
    private static $instance;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    private function __construct()
    {
        $this->logger = new Logger('telegramm');
        $this->logger->pushHandler(new StreamHandler(PATH.'app/storage/log.txt'));
    }

    /**
     * Get Instance
     *
     * @return \Telegramm\Log
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public static function debug($message, array $context = array())
    {
        return self::getInstance()->logger->debug($message, $context);
    }

    /**
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public static function info($message, array $context = array())
    {
        return self::getInstance()->logger->info($message, $context);
    }

    /**
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public static function notice($message, array $context = array())
    {
        return self::getInstance()->logger->notice($message, $context);
    }

    /**
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public static function warning($message, array $context = array())
    {
        return self::getInstance()->logger->warning($message, $context);
    }

    /**
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public static function error($message, array $context = array())
    {
        return self::getInstance()->logger->error($message, $context);
    }

    /**
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public static function critical($message, array $context = array())
    {
        return self::getInstance()->logger->critical($message, $context);
    }

    /**
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public static function alert($message, array $context = array())
    {
        return self::getInstance()->logger->alert($message, $context);
    }

    /**
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public static function emergency($message, array $context = array())
    {
        return self::getInstance()->logger->emergency($message, $context);
    }
}

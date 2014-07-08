<?php

/*
 * This file is part of the Telegramm package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Telegramm\Command\Commands;

/**
 * Class Script
 *
 * @author WN
 * @package Telegramm\Command\Commands
 */
class Script implements CommandInterface
{
    protected $name;
    protected $script;

    /**
     * Instantiate Command Object
     *
     * @param string $name
     * @param string $script
     */
    public function __construct($name, $script='')
    {
        $this->name = $name;
        $this->script = $script;
    }

    /**
     * Execute Command
     *
     * @throws \Exception
     * @return mixed
     */
    public function execute()
    {
        $filePath = PATH . 'config/scripts/' . $this->script;
        if (!file_exists($filePath)) throw new \Exception('Script file doesn\'t exists.');
        return shell_exec('sh '. $filePath);
    }

    /**
     * @return int
     */
    public function getType()
    {
        return self::TYPE_SCRIPT;
    }

}

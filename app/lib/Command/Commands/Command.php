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

use Telegramm\Command\Result;

/**
 * Class Command
 *
 * @author WN
 * @package Telegramm\Command
 */
class Command implements CommandInterface
{
    protected $name;
    protected $command;

    /**
     * Instantiate Command Object
     *
     * @param string $name
     * @param string $command
     */
    public function __construct($name, $command='')
    {
        $this->name = $name;
        $this->command = $command;
    }

    /**
     * Execute Command
     *
     * @return \Telegramm\Command\ResultInterface;
     */
    public function execute()
    {
        $result = new Result();
        $result->setMessage(shell_exec($this->command));
        $result->setCompleted();

        return $result;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return CommandInterface::TYPE_COMMAND;
    }

}

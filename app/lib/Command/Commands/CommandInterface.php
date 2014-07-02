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
 * Interface CommandInterface
 *
 * @author WN
 * @package Telegramm\Command
 */
interface CommandInterface
{
    const TYPE_ALIAS = 1;
    const TYPE_COMMAND = 2;
    const TYPE_SCRIPT = 4;
    const TYPE_CONTROLLER = 8;

    /**
     * Instantiate Command Object
     *
     * @param string $name
     */
    public function __construct($name);

    /**
     * Execute Command
     *
     * @return mixed
     */
    public function execute();

    /**
     * @return int
     */
    public function getType();
}

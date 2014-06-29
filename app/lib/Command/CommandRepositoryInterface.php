<?php

/*
 * This file is part of the Telegramm package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Telegramm\Command;

/**
 * Interface CommandRepositoryInterface
 *
 * @author WN
 * @package Telegramm\Command
 */
interface CommandRepositoryInterface
{
    /**
     * @param  string     $command
     * @return array|bool
     */
    public function find($command);

    /**
     * @return array
     */
    public function getList();
}

<?php

/*
 * This file is part of the Telegramm package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TelegrammControllers;

use Telegramm\Command\Result;

/**
 * Class Example - example of Telegramm Controller
 *
 * @package TelegrammControllers
 */
class Example
{
    /**
     * @return \Telegramm\Command\Result
     */
    public function serverinfo()
    {
        $result = new Result();

        $result->setMessage(print_r($_SERVER, true));
        $result->setSucceed();

        return $result;
    }
}

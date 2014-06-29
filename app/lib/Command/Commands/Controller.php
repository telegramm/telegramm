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

use Symfony\Component\HttpFoundation\Response;

/**
 * Class Controller
 *
 * @author WN
 * @package Telegramm\Command\Commands
 */
class Controller implements CommandInterface
{
    protected $name;
    protected $controller;

    /**
     * Instantiate Command Object
     *
     * @param string $name
     * @param array  $controller
     */
    public function __construct($name, array $controller=[])
    {
        $this->name = $name;
        $this->controller = $controller;
    }

    /**
     * Execute Command
     *
     * @return mixed
     */
    public function execute()
    {
        $result = call_user_func($this->controller);

        if ($result instanceof Response) {
            return $result->getContent();
        }

        return $result;
    }

}

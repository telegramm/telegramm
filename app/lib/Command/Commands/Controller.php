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
        $this->controller[0] = '\TelegrammControllers\\' . $this->controller[0];
    }

    /**
     * Execute Command
     *
     * @throws \Exception
     * @return \Telegramm\Command\ResultInterface;
     */
    public function execute()
    {
        if (!is_callable($this->controller)) throw new \Exception('Requested Controller is missing!');

        $result = call_user_func($this->controller);

        if ($result instanceof \Telegramm\Command\ResultInterface) {
            return $result;
        }

        throw new \Exception('Controller must return proper result!');
    }

    /**
     * @return int
     */
    public function getType()
    {
        return CommandInterface::TYPE_CONTROLLER;
    }

}

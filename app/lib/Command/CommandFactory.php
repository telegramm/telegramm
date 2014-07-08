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

use Telegramm\Command\Commands\Command;
use Telegramm\Command\Commands\Controller;
use Telegramm\Command\Commands\CommandInterface;
use Telegramm\Command\Commands\Script;
use Telegramm\Command\Commands\SystemController;
use Telegramm\Log;

/**
 * Class CommandFactory
 *
 * @author WN
 * @package Telegramm\Command
 */
class CommandFactory
{
    /**
     * @param $components
     * @return \Telegramm\Command\Commands\CommandInterface
     * @throws \Exception
     */
    public static function create($components)
    {
        if (!array_key_exists('type', $components)) throw new \Exception('Type is missing');

        switch ($components['type']) {
            case 'command':
            case CommandInterface::TYPE_COMMAND:
                if (!array_key_exists('command', $components)) throw new \Exception('Command is missing');
                return new Command($components['name'], $components['command']);
                break;
            case 'script':
            case CommandInterface::TYPE_SCRIPT:
                if (!array_key_exists('script', $components)) throw new \Exception('Script is missing');
                return new Script($components['name'], $components['script']);
                break;
            case 'controller':
            case CommandInterface::TYPE_CONTROLLER:
                die('Need to implement...');
                break;
            case 'system_controller':
            case CommandInterface::TYPE_SYSTEM_CONTROLLER:
                if (!array_key_exists('controller', $components)) throw new \Exception('Controller array is missing');
                return new SystemController($components['name'], $components['controller']);
                break;
            case 'alias':
            case CommandInterface::TYPE_ALIAS:
                if (!array_key_exists('alias', $components))
                    throw new \Exception('Controller array is missing');

                $repository = new Repository();

                if (!($command = $repository->find($components['alias'])))
                    throw new \Exception('Command doesn\'t exists');

                return self::create($command);
                break;
            default:
                Log::error('Command type mus be valid type to instantiate command instance.');
                throw new \Exception('Invalid Command type.');
        }

        throw new \Exception('Something unexpected happened');
    }
}

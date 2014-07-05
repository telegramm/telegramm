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
 * Class RunCommand
 *
 * @author WN
 * @package Telegramm\Command
 */
class RunCommand
{
    protected $commandRepository;

    /**
     * @param CommandRepositoryInterface $commandRepository
     */
    public function __construct(CommandRepositoryInterface $commandRepository)
    {
        $this->commandRepository = $commandRepository;
    }

    /**
     * @param $command
     * @return string
     */
    public function runCommand($command)
    {
        if (!($command = $this->commandRepository->find($command))) {
            return 'Command doesn\'t exists';
        }

        try {
            $instance = \Telegramm\Command\CommandFactory::create($command);

            return $instance->execute();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

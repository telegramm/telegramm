<?php

/*
 * This file is part of the Telegramm package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Controllers;

use Telegramm\Command\Repository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Telegramm\Command\Result;

/**
 * Class ListCommand
 *
 * @author WN <wojtek@gettelegramm.org>
 * @package Controllers
 */
class ListCommand
{
    /**
     * Commands Names List - API Call
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function short()
    {
        $repository = new Repository();

        return JsonResponse::create($repository->getList());
    }

    /**
     * Commands List - API Call
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function full()
    {
        $repository = new Repository();

        return JsonResponse::create($repository->all());
    }

    /**
     * Commands List - TelegrammUI
     *
     * @return \Telegramm\Command\ResultInterface;
     */
    public function fullText()
    {
        $repository = new Repository();

        $rtn  = " __\n";
        $rtn .= "/   _  _  _  _  _  _| _  |  . _|_\n";
        $rtn .= "\__(_)||||||(_|| )(_|_)  |__|_)|_ \n\n";

        $rtn .= "Available commands: \n";

        foreach ($repository->all() as $command) {
            $rtn .= ($command['type']=='alias'?('*'.$command['name']):('<a rel="' . $command['name'] . '">' . $command['name'] . '</a>')) . (strlen($command['name'])<8?"\t":"") . "\t" . $command['title'] . "\n";
        }

        $result = new Result();

        $result->setMessage($rtn);
        $result->setCompleted();

        return $result;
    }
}

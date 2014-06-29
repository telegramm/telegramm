<?php

/*
 * This file is part of the Telegramm package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace controllers;

use Telegramm\Command\Repository;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ListCommand
 *
 * @author WN <wojtek@gettelegramm.org>
 * @package Controllers
 */
class ListCommand
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function short()
    {
        $repository = new Repository();

        return JsonResponse::create($repository->getList());
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function full()
    {
        $repository = new Repository();

        return JsonResponse::create($repository->all());
    }

    /**
     * @return string
     */
    public function fullText()
    {
        $repository = new Repository();

        $rtn = "Available commands: \n\n";

        foreach ($repository->all() as $command) {
            $rtn .= "" . $command['name'] . "\t\t" . $command['title'] . "\n";
        }

        return $rtn;
    }
}

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

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Manage
 *
 * @author WN
 * @package Controllers
 */
class Manage
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function compile()
    {
        $repository = new \Telegramm\Command\Repository();

        if ($repository->compile()) {
            return JsonResponse::create('Command list successfully compiled', 200);
        }

        return JsonResponse::create('Problem while compiling commands list', 400);
    }
}

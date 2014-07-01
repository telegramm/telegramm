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
 * Class RunCommand
 *
 * @author WN
 * @package Controllers
 */
class RunCommand
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function run()
    {
        $request = json_decode(file_get_contents("php://input"), true);

        foreach ($request as $row) {
            $params[$row['name']] = $row['value'];
        }

        if (!array_key_exists('command', $params)) return JsonResponse::create(['error' => 'Request a command'], 400)->send();

        $service = new \Telegramm\Command\RunCommand(new \Telegramm\Command\Repository());

        $result = $service->runCommand($params['command']);

        return JsonResponse::create(['result' => $result], 200);
    }
}

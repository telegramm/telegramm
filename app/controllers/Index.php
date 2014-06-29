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

use Symfony\Component\HttpFoundation\Response;

/**
 * Class Index
 *
 * @author WN <wojtek@gettelegramm.org>
 * @package Controllers
 */
class Index
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return Response::create(file_get_contents(PATH.'app/views/base.php'));
    }
}

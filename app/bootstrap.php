<?php

/*
 * This file is part of the Telegramm package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
|--------------------------------------------------------------------------
| Application Bootstrap
|--------------------------------------------------------------------------
*/

/**
 * @todo: This should be only pure bootstrap. Needs some kind system/core class.
 */

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

define('PATH', __DIR__.'/../');

$loader = require_once(PATH.'vendor/autoload.php');

$loader->addPsr4('Controllers\\', PATH.'app/controllers');
$loader->addPsr4('Telegramm\\', PATH.'app/lib/');

$routes = require_once(PATH.'app/routes.php');

$context = new RequestContext($_SERVER['REQUEST_URI']);

$matcher = new UrlMatcher($routes, $context);

$parameters = $matcher->match($_SERVER['REQUEST_URI']);

$response = call_user_func($parameters['controller']);

if ($response instanceof Symfony\Component\HttpFoundation\Response) {

    $response->send();

} else {

    echo ($response);

}

die();

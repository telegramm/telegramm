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
| Application Routes
|--------------------------------------------------------------------------
*/

use \Symfony\Component\Routing\RouteCollection;
use \Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('index', new Route('/', array('controller' => array('\Controllers\Index', 'index'))));

$routes->add('typeaheadList', new Route('/list/typeahead', array('controller' => array('\Controllers\ListCommand', 'typeahead'))));

$routes->add('shortList', new Route('/list', array('controller' => array('\Controllers\ListCommand', 'short'))));

$routes->add('fullList', new Route('/list/full', array('controller' => array('\Controllers\ListCommand', 'full'))));

$routes->add('runCommand', new Route('/run', array('controller' => array('\Controllers\RunCommand', 'run'))));

return $routes;

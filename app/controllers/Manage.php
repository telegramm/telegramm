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

/**
 * Class Manage
 *
 * @author WN
 * @package Controllers
 */
class Manage
{
    /**
     * Compile Commands Repository - TelegrammUI
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function compile()
    {
        $repository = new \Telegramm\Command\Repository();

        if ($repository->compile()) {

            $rtn  = " __\n";
            $rtn .= "/   _  _  _ .| _ _|\n";
            $rtn .= "\__(_)||||_)||(-(_|\n";
            $rtn .= "         |\n\n";
            $rtn .= "Command list successfully compiled";

            return $rtn;
        }

        return 'Problem while compiling commands list';
    }
}

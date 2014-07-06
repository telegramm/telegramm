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
 * Class Misc
 *
 * @package Controllers
 */
class Misc
{
    /**
     * Hello Telegramm - TelegrammUI
     *
     * @return string
     */
    public function hello()
    {
//        $rtn = " __           ___
///\ \__       /\_ \
//\ \ ,_\    __\//\ \      __     __   _ __    __      ___ ___     ___ ___
// \ \ \/  /'__`\\ \ \   /'__`\ /'_ `\/\`'__\/'__`\  /' __` __`\ /' __` __`\
//  \ \ \_/\  __/ \_\ \_/\  __//\ \L\ \ \ \//\ \L\.\_/\ \/\ \/\ \/\ \/\ \/\ \
//   \ \__\ \____\/\____\ \____\ \____ \ \_\\ \__/.\_\ \_\ \_\ \_\ \_\ \_\ \_\
//    \/__/\/____/\/____/\/____/\/___L\ \/_/ \/__/\/_/\/_/\/_/\/_/\/_/\/_/\/_/
//                                /\____/
//                                \_/__/     \n\n";

        $rtn =  "<span style=\"color: #b58900;\"> _       _\n";
        $rtn .= "| |_ ___| | ___  __ _ _ __ __ _ _ __ ___  _ __ ___\n";
        $rtn .= "| __/ _ \ |/ _ \/ _` | '__/ _` | '_ ` _ \| '_ ` _ \\ \n";
        $rtn .= "| ||  __/ |  __/ (_| | | | (_| | | | | | | | | | | |\n";
        $rtn .= " \__\___|_|\___|\__, |_|  \__,_|_| |_| |_|_| |_| |_|\n";
        $rtn .= "                |___/   </span>\n\n";

        $rtn .= "----------------------------------------------------\n";
        $rtn .= "telegramm 2014";

        return $rtn;
    }

    /**
     * Null Message - TelegrammUI
     *
     * @return string
     */
    public function null()
    {
        $ar[] = " ____ ____ ____ ____ \n||N |||U |||L |||L ||\n||__|||__|||__|||__||\n|/__\|/__\|/__\|/__\|";
        $ar[] = " _   _ _    _ _      _      \n| \ | | |  | | |    | |     \n|  \| | |  | | |    | |     \n| . ` | |  | | |    | |     \n| |\  | |__| | |____| |____ \n|_| \_|\____/|______|______|";
        $ar[] = "_  _ _  _ _    _    \n|\ | |  | |    |    \n| \| |__| |___ |___ ";
        $ar[] = " _ _  _ _  _    _   \n| \ || | || |  | |  \n|   || ' || |_ | |_ \n|_\_|`___'|___||___|";
        $ar[] = " /| )/  //  /  \n/ |/(__/(__(__ ";
        $ar[] = "    _/      _/  _/    _/  _/        _/     \n   _/_/    _/  _/    _/  _/        _/      \n  _/  _/  _/  _/    _/  _/        _/       \n _/    _/_/  _/    _/  _/        _/        \n_/      _/    _/_/    _/_/_/_/  _/_/_/_/ ";
        $ar[] = ".-..-..-..-..-.   .-.   \n| .` || || || |__ | |__ \n`-'`-'`----'`----'`----'";

        return $ar[rand(0,6)] . "\n\nPlease type any command or type <a rel='help'>#help</a>...";
    }
}

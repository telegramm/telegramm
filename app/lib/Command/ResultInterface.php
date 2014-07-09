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
 * Interface ResultInterface
 *
 * @author WN
 * @package Telegramm\Command
 */
interface ResultInterface
{
    const STATUS_FAILED = 1;
    const STATUS_SUCCEED = 2;
    const STATUS_COMPLETED = 4;

    /**
     * Set result message (original return)
     *
     * @param  string $message
     * @return bool
     */
    public function setMessage($message);

    /**
     * Get result message
     *
     * @return string
     */
    public function getMessage();

    /**
     * Get Status - returns status of result
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set status as Succeed (also means Completed)
     *
     * @return bool
     */
    public function setSucceed();

    /**
     * Set status as Failed (is this mean also Completed)
     *
     * @return bool
     */
    public function setFailed();

    /**
     * Set status as Completed
     *
     * Means that requested actions are completed, but it not defining if it was Succeed or not
     *
     * @return bool
     */
    public function setCompleted();

    /**
     * Check if status is Completed
     *
     * @return bool
     */
    public function isCompleted();

    /**
     * Check if status is Succeed
     *
     * @return bool
     */
    public function isSucceed();

    /**
     * Check if status is Failed
     *
     * @return bool
     */
    public function isFailed();
}

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
 * Class Result - Result of Command Execution
 *
 * @package Telegramm\Command
 */
class Result implements ResultInterface
{
    protected $message;
    protected $status;

    /**
     * Set result message (original return)
     *
     * @param  string $message
     * @return bool
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return true;
    }

    /**
     * Get result message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get Status - returns status of result
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status as Succeed (also means Completed)
     *
     * @return bool
     */
    public function setSucceed()
    {
        $this->status = self::STATUS_SUCCEED | self::STATUS_COMPLETED;

        return true;
    }

    /**
     * Set status as Failed (is this mean also Completed)
     *
     * @return bool
     */
    public function setFailed()
    {
        $this->status = self::STATUS_FAILED;

        return true;
    }

    /**
     * Set status as Completed
     *
     * Means that requested actions are completed, but it not defining if it was Succeed or not
     *
     * @return bool
     */
    public function setCompleted()
    {
        $this->status |= self::STATUS_COMPLETED;

        return true;
    }

    /**
     * Check if status is Completed
     *
     * @return bool
     */
    public function isCompleted()
    {
        return (bool) ($this->status & self::STATUS_COMPLETED);
    }

    /**
     * Check if status is Succeed
     *
     * @return bool
     */
    public function isSucceed()
    {
        return (bool) ($this->status & self::STATUS_SUCCEED);
    }

    /**
     * Check if status is Failed
     *
     * @return bool
     */
    public function isFailed()
    {
        return (bool) ($this->status & self::STATUS_FAILED);
    }

}

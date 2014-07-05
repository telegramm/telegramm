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
 * Class Repository
 *
 * @author WN
 * @package Telegramm\Command
 */
class Repository implements CommandRepositoryInterface
{
    protected $compiled;
    protected $compiledList;

    protected $sourcePath;
    protected $compiledFile;
    protected $compiledListFile;

    public function __construct()
    {
        $this->sourcePath = PATH . 'config/commands';
        $this->compiledFile = PATH . 'app/storage/compiledCommands.json';
        $this->compiledListFile = PATH . 'app/storage/compiledList.json';
    }

    /**
     * @param $command
     * @return array|bool
     */
    public function find($command)
    {
        if (!$this->isCompiled()) $this->compile();

        $command = strtolower($command);

        $data = $this->all();

        if (!array_key_exists($command, $data)) return false;
        return $data[$command];
    }

    /**
     * @return array
     */
    public function all()
    {
        if (!$this->isCompiled()) $this->compile();
        return json_decode(file_get_contents($this->compiledFile), true);
    }

    /**
     * @return string
     */
    public function getListJSON()
    {
        if (!$this->isCompiled()) $this->compile();
        return file_get_contents($this->compiledListFile);
    }

    /**
     * @return string
     */
    public function getList()
    {
        return json_decode($this->getListJSON(), true);
    }

    /**
     * @return bool
     */
    public function compile()
    {
        $this->compiled = [];
        $this->compiledList = [];

        foreach (scandir($this->sourcePath) as $element) {
            if (
                is_file($this->sourcePath . '/' . $element) &&
                pathinfo($element, PATHINFO_EXTENSION) == 'json'
            ) {
                if ($content = json_decode(file_get_contents($this->sourcePath . '/' . $element), true)) {

                    $this->compileCommands($content);

                } else {

                    \Telegramm\Log::error('File ' . $element . ' is not correct JSON');

                }
            }
        }

        $this->compileSystemCommands();

        return $this->saveCompiled();
    }

    /**
     * @param  array $content
     * @return bool
     */
    private function compileCommands($content)
    {
        if (is_array($content)) {
            if (
                array_key_exists('name', $content) &&
                array_key_exists('type', $content)
            ) {
                if ($content['type'] == 'system_controller') return true;

                $this->compiled[strtolower($content['name'])] = $content;
                $this->compiledList[] = strtolower($content['name']);

                return true;
            }
            foreach ($content as $element) {

                $this->compileCommands($element);

            }
        }

        return true;
    }

    /**
     * @return bool
     */
    private function saveCompiled()
    {
        if (
            file_put_contents($this->compiledFile, json_encode($this->compiled)) &&
            file_put_contents($this->compiledListFile, json_encode($this->compiledList))
        ) {
            \Telegramm\Log::info('Commands was compiled and saved');

            return true;
        }
        \Telegramm\Log::error('Problem while saving compiled commands');

        return false;
    }

    /**
     * @return bool
     */
    public function isCompiled()
    {
        if (file_exists($this->compiledFile) && file_exists($this->compiledListFile)) return true;
        return false;
    }

    /**
     * @return void
     */
    private function compileSystemCommands()
    {
        $this->compiled['list'] = [
            'name'          => 'list',
            'type'          => 'system_controller',
            'controller'    => array('\Controllers\ListCommand', 'fullText'),
            'title'         => 'List of available commands',
            'description'   => ''
        ];
        $this->compiledList[] = 'list';

        $this->compiled['help'] = [
            'name'          => 'help',
            'type'          => 'alias',
            'alias'         => 'list',
            'title'         => 'Alias of #list'
        ];
        $this->compiledList[] = 'help';

        $this->compiled['compile'] = [
            'name'          => 'compile',
            'type'          => 'system_controller',
            'controller'    => array('\Controllers\Manage', 'compile'),
            'title'         => 'Compile repository',
            'description'   => ''
        ];
        $this->compiledList[] = 'compile';
    }
}

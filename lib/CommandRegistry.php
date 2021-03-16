<?php

namespace Minicli;

class CommandRegistry
{
    protected $commandsPath;

    protected $namespaces = [];

    protected $defaultRegistry = [];

    public function __construct($commandsPath)
    {
        $this->commandsPath = $commandsPath;
        $this->autoloadNamespaces();
    }

    public function autoloadNamespaces()
    {
        foreach (glob($this->getCommandsPath() . '/*', GLOB_ONLYDIR) as $namespacePath) {
            $this->registerNamespace(basename($namespacePath));
        }
    }

    public function registerNamespace($commandNamespace)
    {
        $namespace = new CommandNamespace($commandNamespace);
        $namespace->loadControllers($this->getCommandsPath());
        $this->namespaces[strtolower($commandNamespace)] = $namespace;
    }

    public function getNamespace($command)
    {
        return isset($this->namespaces[$command]) ? $this->namespaces[$command] : null;
    }

    public function getCommandsPath()
    {
        return $this->commandsPath;
    }

    public function registerCommand($name, $callable)
    {
        $this->defaultRegistry[$name] = $callable;
    }

    public function getCommand($command)
    {
        return isset($this->defaultRegistry[$command]) ? $this->defaultRegistry[$command] : null;
    }

    public function getCallableController($command, $subcommand = null)
    {
        $namespace = $this->getNamespace($command);

        if ($namespace !== null) {
            return $namespace->getController($subcommand);
        }

        return null;
    }

    public function getCallable($command)
    {
        $singleCommand = $this->getCommand($command);
        if ($singleCommand === null) {
            throw new \Exception(sprintf("Command \"%s\" not found.", $command));
        }

        return $singleCommand;
    }
}

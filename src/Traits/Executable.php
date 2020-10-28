<?php

namespace LaravelVersion\Traits;

use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Process\Process;

trait Executable
{
    /**
     * @param string $command
     * @return Process
     */
    protected function exec(string $command)
    {
        $process = Process::fromShellCommandline($command);
        $code = $process->run();

        if ($code) {
            throw new RuntimeException($process->getErrorOutput());
        }

        return $process;
    }
}
<?php

namespace LaravelVersion\Helper;

use LaravelVersion\Traits\Executable;

class GitHelper
{
    use Executable;

    public function __construct(string $version)
    {
        $this->version = $version;
    }

    public function add()
    {
        $this->exec('git add version.json');

        return $this;
    }

    public function commit()
    {
        $this->exec("git commit -m '{$this->version} version up'");

        return $this;
    }

    public function push()
    {
        $this->exec('git push');

        return $this;
    }
}
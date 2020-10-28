<?php

namespace LaravelVersion\Library;

use LaravelVersion\Traits\Executable;

class Git
{
    use Executable;

    /**
     * GitHelper constructor.
     * @param string $version
     */
    public function __construct(string $version)
    {
        $this->version = $version;
    }

    /**
     * @return $this
     */
    public function add()
    {
        $this->exec('git add version.json');

        return $this;
    }

    /**
     * @return $this
     */
    public function commit()
    {
        $this->exec("git commit -m '{$this->version} version up'");

        return $this;
    }

    /**
     * @return $this
     */
    public function push()
    {
        $this->exec('git push');

        return $this;
    }
}

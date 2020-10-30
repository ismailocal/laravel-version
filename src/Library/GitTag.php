<?php

namespace LaravelVersion\Library;

use LaravelVersion\Traits\Executable;

class GitTag
{
    use Executable;

    /** @var string */
    protected $name;

    /**
     * @return $this
     */
    public function add(string $name, string $message)
    {
        $this->name = $name;
        $this->exec("git tag -a {$name} -m '{$message}'");

        return $this;
    }

    /**
     * @return $this
     */
    public function push()
    {
        $this->exec("git push origin {$this->name}");

        return $this;
    }
}

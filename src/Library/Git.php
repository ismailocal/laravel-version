<?php

namespace LaravelVersion\Library;

use LaravelVersion\Traits\Executable;

class Git
{
    use Executable;

    /**
     * @return $this
     */
    public function add(string $file)
    {
        $this->exec('git add ' . $file);

        return $this;
    }

    /**
     * @return $this
     */
    public function commit(string $message)
    {
        $this->exec("git commit -m '{$message}'");

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

<?php

namespace LaravelVersion\Helper;

use LaravelVersion\Traits\Executable;

class GitTagHelper
{
    use Executable;

    /** @var string */
    protected $version;

    /**
     * GitTagHelper constructor.
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
        $this->exec("git tag -a {$this->version} -m 'v{$this->version}'");

        return $this;
    }

    /**
     * @return $this
     */
    public function push()
    {
        $this->exec("git push origin {$this->version}");

        return $this;
    }
}
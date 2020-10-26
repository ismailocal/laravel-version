<?php

namespace LaravelVersion\Helper;

class VersionHelper
{
    /** @var array */
    protected $version;

    /**
     * @return array
     */
    private function initialVersion()
    {
        return [
            'major' => 0,
            'minor' => 0,
            'patch' => 0
        ];
    }

    /**
     * @return string
     */
    private function getPath()
    {
        return base_path('version.json');
    }

    /**
     * @return bool
     */
    public function reset()
    {
        $path = $this->getPath();

        if (file_exists($path)) {
            unlink($path);
        }

        return $this->generate();
    }

    /**
     * @return bool
     */
    public function generate()
    {
        $path = $this->getPath();

        if (!file_exists($path)) {
            file_put_contents($path, json_encode($this->initialVersion()));
            return true;
        }

        return false;
    }

    /**
     * @return array|mixed
     */
    public function version()
    {
        $path = $this->getPath();

        if (file_exists($path)) {
            return json_decode(file_get_contents($path), true);
        }

        return [];
    }

    /**
     * @param $level
     * @return bool
     */
    public function up($level)
    {
        $this->version = $this->version();

        $version = $this->version;

        $up = false;
        foreach ($version as $key => $value) {
            if ($key === $level) {
                $up = true;
                $version[$key] += 1;
            } else if ($up) {
                $version[$key] = 0;
            }
        }

        $path = $this->getPath();
        if (file_exists($path)) {
            file_put_contents($path, json_encode($version));
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function rollback()
    {
        $path = $this->getPath();
        if (file_exists($path) && $this->version) {
            file_put_contents($path, json_encode($this->version));
            return true;
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode('.', $this->version());
    }
}
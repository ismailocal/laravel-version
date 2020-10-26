<?php

namespace LaravelVersion\Helper;

class VersionHelper
{
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
        return app_path('version.json');
    }

    /**
     * @return bool
     */
    public function reset()
    {
        $path = $this->getPath();

        if (!file_exists($path)) {
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
}
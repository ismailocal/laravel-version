<?php

namespace LaravelVersion\Helper;

class Version
{
    /** @var array */
    protected static $version;

    /**
     * @return array
     */
    private static function initialVersion()
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
    private static function getPath()
    {
        return base_path('version.json');
    }

    /**
     * @return bool
     */
    public static function reset()
    {
        $path = static::getPath();

        if (file_exists($path)) {
            unlink($path);
        }

        return static::generate();
    }

    /**
     * @return bool
     */
    public static function generate()
    {
        $path = static::getPath();

        if (!file_exists($path)) {
            file_put_contents($path, json_encode(static::initialVersion()));
            return true;
        }

        return false;
    }

    /**
     * @return array|mixed
     */
    public static function version()
    {
        $path = static::getPath();

        if (file_exists($path)) {
            return json_decode(file_get_contents($path), true);
        }

        return [];
    }

    /**
     * @param $level
     * @return bool
     */
    public static function up($level)
    {
        static::$version = static::version();

        $version = static::$version;

        $up = false;
        foreach ($version as $key => $value) {
            if ($key === $level) {
                $up = true;
                $version[$key] += 1;
            } else if ($up) {
                $version[$key] = 0;
            }
        }

        $path = static::getPath();
        if (file_exists($path)) {
            file_put_contents($path, json_encode($version));
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public static function rollback()
    {
        $path = static::getPath();
        if (file_exists($path) && static::$version) {
            file_put_contents($path, json_encode(static::$version));
            return true;
        }
    }

    /**
     * @return string
     */
    public static function toString()
    {
        return implode('.', static::version());
    }
}

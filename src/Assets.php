<?php

namespace Inertia;

class Assets
{
    private $assets = '/assets/';

    public function css($name = 'app.css'): string
    {
        return self::_hash($name);
    }

    public function js($name = 'app.js'): string
    {
        return self::_hash($name);
    }

    private function _hash($file): string
    {
        try {
            $path = $this->assets . $file;

            if (file_exists($path)) {
                return $path . '?v=' . md5_file($path);
            }

            throw new \Exception('FILE_NOT_FOUND (' . $file . ')');
        } catch (\Throwable $th) {
            return $file . '?error=' . $th->getMessage();
        }
    }
}

<?php

namespace Inertia;

class Assets
{
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

            if (file_exists(FCPATH . $file)) {
                return $file . '?v=' . md5_file(FCPATH . $file);
            }

            throw new \Exception('FILE_NOT_FOUND');
        } catch (\Throwable $th) {
            return $file . '?error=' . $th->getMessage();
        }
    }
}

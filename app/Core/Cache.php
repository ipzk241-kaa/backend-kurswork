<?php
namespace App\Core;

class Cache
{
    protected $cacheDir = __DIR__ . '/../../storage/cache/';
    protected $ttl = 300;

    public function get($key)
    {
        $file = $this->getPath($key);
        if (file_exists($file) && (filemtime($file) + $this->ttl) > time()) {
            return file_get_contents($file);
        }
        return false;
    }

    public function set($key, $content)
    {
        file_put_contents($this->getPath($key), $content);
    }

    public function delete($key)
    {
        $file = $this->getPath($key);
        if (file_exists($file)) {
            unlink($file);
        }
    }

    private function getPath($key)
    {
        return $this->cacheDir . md5($key) . '.html';
    }
}

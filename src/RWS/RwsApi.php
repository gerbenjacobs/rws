<?php
namespace rws;


class RwsApi
{
    private $cache_data = 'cache/meetdata.zip';
    private $cache_location = 'cache/locations.xml';
    private $cache_expiration_data = 600; // 5 minutes
    private $cache_expiration_location = 43200; // 12 hours

    public function isStale()
    {
        return ((time() - filemtime($this->cache_data)) > $this->cache_expiration_data);
    }

    public function update()
    {
        if ($this->isStale()) {
            // redownlaod
        }

        return false;
    }

    public function getMeasurePointByLocation($string)
    {
    }
}
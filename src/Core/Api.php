<?php

namespace Serrex\RestBunble\Core;

use Illuminate\Support\Str;

class Api
{

    public function __construct()
    {
    }

    public function version($version, $callback)
    {
        $headerVersion =  $this->getVersion();
        if ($version == $headerVersion) {
            call_user_func($callback);
        }
    }

    private function getVersion()
    {
        $version = "";
        $header = \Request::header('Accept');
        $header = explode(";", $header);
        $mimeTypeCount = count($header);
        for ($i= 0; $i < $mimeTypeCount; $i++) {
            if (Str::contains($header[$i], ['version'])) {
                $version = explode("=", $header[$i])[1];
            }
        }

        if ($version=="") {
            throw new \Exception("API version not found", 1);
        }

        return $version;
    }
}

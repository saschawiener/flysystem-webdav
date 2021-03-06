<?php
/**
 * @author Sascha Wiener.
 * Date: 13.10.2017
 * Time: 14:32
 *
 * "Whenever you are tempted to type something into
 * a print statement or a debugger expression, write it
 * as a test instead." - Martin Fowler
 */

namespace SaschaWiener\Flysystem\WebDAV;

use League\Flysystem\Config as Config;
use League\Flysystem\Util;

class WebDAVAdapter extends \League\Flysystem\WebDAV\WebDAVAdapter
{

    /**
     * Stream delegator.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config
     * @param string   $fallback
     *
     * @return mixed fallback result
     */
    protected function stream($path, $resource, Config $config, $fallback)
    {
        Util::rewindStream($resource);
        $fallbackCall = [$this, $fallback];

        return call_user_func($fallbackCall, $path, $resource, $config);
    }
}
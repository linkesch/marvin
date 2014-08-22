<?php

namespace Marvin\Marvin;

use Composer\Script\Event;

class Install
{
    public static function postPackageInstall(Event $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        if ($installedPackage->getName() != 'marvin/marvin') {
            return false;
        }

        $config = require 'config.php';

        // Copy web dir
        self::copy(__DIR__ ."/Web", $config['web_dir']);

        // Create app/config.php to allow installation
        $appConfig = $config['app_dir'] .'/config.php';
        if (file_exists($appConfig) == false) {
            $fp = fopen($appConfig, 'w');
            fwrite($fp, '<?php

$app["debug"] = true;
');
            fclose($fp);
        }


        /*$plugins = glob(__DIR__ .'/../*');
        foreach ($plugins as $plugin) {
            if (file_exists($plugin ."/Themes")) {
                self::copy($plugin ."/Themes", $config['themes_dir']);
            }
        }*/
    }

    public static function copy($source, $dest)
    {
        if (!file_exists($dest)) {
            mkdir($dest, 0755, true);
        }

        foreach ($iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST) as $item) {
            if ($item->isDir() && file_exists($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName()) == false) {
                mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            } elseif ($item->isFile()) {
                copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            }
        }
    }
}

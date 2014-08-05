<?php

namespace Marvin\Core;

use Composer\Script\Event;

class Install
{
  public static function install(Event $event)
  {
    $config = require 'config.php';

    self::copy(__DIR__ ."/Web", $config['web_dir']);
    self::copy(__DIR__ ."/Themes", $config['themes_dir']);
  }

  public static function copy($source, $dest)
  {
    if(!file_exists($dest))
    {
      mkdir($dest, 0755, true);
    }

    foreach($iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST) as $item)
    {
      if($item->isDir())
      {
        mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
      }
      else
      {
        copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
      }
    }
  }
}

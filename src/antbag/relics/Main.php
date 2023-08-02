<?php

namespace antbag\relics;

use pocketmine\plugin\PluginBase;
use antbag\relics\EventListener;

class Main extends PluginBase {
  
  public function onEnable(): void {
    $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
  }
}
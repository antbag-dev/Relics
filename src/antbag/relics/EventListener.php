<?php

namespace antbag\relics;

use pocketmine\block\BlockBreakEvent;
use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\item\VanillaItems;
use pocketmine\item\ItemTypeIds;
use pocketmine\block\BlockTypeIds;
use pocketmine\player\PlayerItemUseEvent;
use pocketmine\server\Server;

class EventListener extends Listener {
  
  public function onBreak(BlockBreakEvent $event) {
    
    foreach($event->getTransaction()->getBlocks() as [$x, $y, $z, $block]){
    if($block->getTypeId() === BlockTypeIds::COBBLESTONE) {
      $chance = mt_rand(1, 100);
      if($chance <= 99) {
      $this->giveRelic($player);
      $player->sendMessage("You received a relic");
      }
    }
  }
  }
  public function giveRelic(Player $player) {
    $relic = VanillaItems::TORCH()->setCustomName("§l§cRELIC");
    $relic->getNamedTag()->setTag("Test");
    $player->getInventory()->addItem($item);
  }
  
  public function onInteract(PlayerItemUseEvent $event) {
    $item = $event->getItem();
    $player = $event->getPlayer();
    if($item->getNamedTag()->hasTag("Test")) {
      
      $commands = [
        "give ". $player->getName(). "diamond 32"
        
        ];
    
    $randomIndex = mt_rand(0, count($commands) - 1);
    $randomCommand = $commands[$randomIndex];
            
    $server = Server::getInstance();
    $server->dispatchCommand($player, $randomCommand);
    }
  }
}
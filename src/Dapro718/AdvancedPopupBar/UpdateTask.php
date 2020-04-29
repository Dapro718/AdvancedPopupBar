<?php

declare(strict_types=1);

namespace Dapro718\AdvancedPopupBar;

use pocketmine\scheduler\Task;
use pocketmine\Player;
use Dapro718\AdvancedPopupBar\Main;

class UpdateTask extends Task {

  public $plugin
  
  public function __construct(Main $plugin) {
    $this->plugin = $plugin;
  }
  
  public function onRun(int $currentTick) {
    $players = $this->plugin->getServer()->getOnlinePlayers();
    foreach ($players as $player) {
      $format = $this->plugin->getFormat($player);
      $player->sendPopup($format);
    }
  }
}

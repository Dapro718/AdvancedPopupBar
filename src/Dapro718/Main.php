<?php

declare(strict_types=1);

namespace Dapro718\AdvancedPopupBar;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\scheduler\TaskScheduler;
use pocketmine\Player;

class Main extends PluginBase {
  
  private static $instance;
  public $config;
  
  public function onEnable() {
    $this->config = $this->getConfig();
    $this->getScheduler->scheduleTask(new Checker($this));
  }
  
  public function updatePopupBar() {
    $players = $this->getServer()->getOnlinePlayers();
    $format = $config->get("popup-format");
    foreach ($players as $player) {
      if(in_array("{X}", $format, true) {
        $x = $player->getFloorX();
        $format = str_replace("{X}", $x, $format); }
      if(in_array("{Y}", $format, true) {
        $y = $player->getFloorY();
        $format = str_replace("{Y}", $y, $format); }
      if(in_array("{Z}", $format, true) {
        $z = $player->getFloorZ();
        $format = str_replace("{Z}", $z, $format);
      if(in_array("{ONLINE}", $format, true) {
        $count = count($players);
        $format = str_replace("{ONLINE}", $count, $format); }
      if(in_array("{MAX_ONLINE}", $format, true) {
        $count = $this->getServer()->getMaxPlayers();
        $format = str_replace("{MAX_ONLINE}", $count, $format); }


<?php

declare(strict_types=1);

namespace Dapro718\AdvancedPopupBar;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\scheduler\TaskScheduler;
use pocketmine\Player;
use pocketmine\Server;
use onebone\economyapi\EconomyAPI;
use Zedstar16\OnlineTime\Main;
use RedCraftPE\RedSkyBlock\Skyblock;
use FactionsPro\FactionsMain;
use Dapro718\AdvancedPopupBat\CheckerTask;

class Main extends PluginBase {
  
  private static $instance;
  public $config;
  
  public function onEnable() {
    $this->config = $this->getConfig();
    $this->getScheduler->scheduleDelayedTask(new CheckerTask($this), 1);
  }
  
  public function getInstance(): Main{
    return self::$instance;
  }
  
  public function getFormat($player) {
    $format = $config->get("popup-format");
      if(in_array("{X}", $format, true)) {
        $x = $player->getFloorX();
        $format = str_replace("{X}", $x, $format); }
      if(in_array("{Y}", $format, true)) {
        $y = $player->getFloorY();
        $format = str_replace("{Y}", $y, $format); }
      if(in_array("{Z}", $format, true)) {
        $z = $player->getFloorZ();
        $format = str_replace("{Z}", $z, $format); }
      if(in_array("{ONLINE}", $format, true)) {
        $count = count($players);
        $format = str_replace("{ONLINE}", $count, $format); }
      if(in_array("{MAX_ONLINE}", $format, true)) {
        $count = $this->getServer()->getMaxPlayers();
        $format = str_replace("{MAX_ONLINE}", $count, $format); }
      if(in_array("{PLAYER_ONLINE_TIME}", $format, true)) {
        $onlineTime = $this->getServer()->getPluginManager()->getPlugin("OnlineTime");
        $time = $onlineTime->getTotalTime($player);
        $format = str_replace("{PLAYER_ONLINE_TIME}", $time, $format); }
      if(in_array("{HEALTH}", $format, true)) {
        $health = $player->getHealth();
        $format = str_replace("{HEALTH}", $health, $format); }
      if(in_array("{MAX_HEALTH}", $format, true)) {
        $maxHealth = $player->getMaxHealth();
        $format = str_replace("{MAX_HEALTH}", $maxHealth, $format); }
      if(in_array("{MONEY}", $format, true)) {
        $money = EconomyAPI::getInstance()->getMoney($player);
        $format = str_replace("{MONEY}", $money, $format); }
      if(in_array("{KILLS}", $format, true)) {
        $kills = KDR::getInstance()->getProvider()->getPlayerKillPoints($player);
        $format = str_replace("{KILLS}", $kills, $format); }
      if(in_array("{DEATHS}", $format, true)) {
        $deaths = KDR::getInstance()->getProvider()->getPlayerDeathPoints($player);
        $format = str_replace("{DEATHS}", $deaths, $format); }
      if(in_array("{KILL_DEATH_RATE}", $format, true)) {
        $kdr = KDR::getInstance()->getProvider()->getKillToDeathRatio($player);
        $format = str_replace("{KILL_DEATH_RATE}", $kdr, $format); }
      if(in_array("{FACTION}", $format, true)) {
        $factionsPro = $this->getServer()->getPluginManager()->getPlugin("FactionsPro");
        $faction = $factionsPro->getFaction($player);
        $format = str_replace("{FACTION}", $faction, $format); }
      if(in_array("{FACTION_POWER}", $format, true)) {
        $factionsPro = $this->getServer()->getPluginManager()->getPlugin("FactionsPro");
        $faction = $factionsPro->getFaction($player);
        $power = $factionsPro->getFactionPower($faction);
        $format = str_replace("{FACTION_POWER}", $power, $format); }
      if(in_array("{ISLAND_NAME}", $format, true)) {
        $name = SkyBlock::getInstance()->getIslandName($player);
        $format = str_replace("{ISLAND_NAME}", $name, $format); }
      if(in_array("{ISLAND_SIZE}", $format, true)) {
        $name = SkyBlock::getInstance()->getSize($player);
        $format = str_replace("{ISLAND_VALUE}", $value, $format); }
      if(in_array("{ISLAND_RANK}", $format, true)) {
        $name = SkyBlock::getInstance()->calcRank($player);
        $format = str_replace("{ISLAND_RANK}", $rank, $format); }
      if(in_array("{ISLAND_VALUE}", $format, true)) {
        $name = SkyBlock::getInstance()->getValue($player);
        $format = str_replace("{ISLAND_VALUE}", $size, $format); }
    return $format;
    }
  
  //API fuctions
  public function updatePopup() {
    $players = $this->getServer()->getOnlinePlayers();
    foreach ($players as $player) {
      $format = $this->getFormat($player);
      $player->sendPopup($format);
    }
  }
}

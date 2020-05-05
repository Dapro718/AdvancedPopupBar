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
use JackMD\KDR\KDR;
use FactionsPro\FactionsMain;
use Dapro718\AdvancedPopupBar\CheckerTask;

class PopupMain extends PluginBase {
  
  private static $instance;
  public $config;
  
  public function onEnable() {
    $this->config = $this->getConfig();
    $this->getScheduler()->scheduleDelayedTask(new CheckerTask($this), 1);
  }
  
  public function getInstance(): PopupMain{
    return self::$instance;
  }
  
  public function startUpdater() {
    $interval = $this->config->get("update-interval") * 20;
    $this->getScheduler()->scheduleRepeatingTask(new UpdateTask($this), $interval);
  }
  
  public function getFormat($player) {
    $format = $this->config->get("popup-format");
    $players = $this->getServer()->getOnlinePlayers();
      if(strpos($format, "{X}")) {
        $x = $player->getFloorX();
        $format = str_replace("{X}", $x, $format); }
      if(strpos($format, "{Y}")) {
        $y = $player->getFloorY();
        $format = str_replace("{Y}", $y, $format); }
      if(strpos($format, "{Z}")) {
        $z = $player->getFloorZ();
        $format = str_replace("{Z}", $z, $format); }
      if(strpos($format, "{ONLINE}")) {
        $count = count($players);
        $format = str_replace("{ONLINE}", $count, $format); }
      if(strpos($format, "{MAX_ONLINE}")) {
        $count = $this->getServer()->getMaxPlayers();
        $format = str_replace("{MAX_ONLINE}", $count, $format); }
      if(strpos($format, "{PLAYER_ONLINE_TIME}")) {
        $onlineTime = $this->getServer()->getPluginManager()->getPlugin("OnlineTime");
        $time = $onlineTime->getTotalTime($player);
        $format = str_replace("{PLAYER_ONLINE_TIME}", $time, $format); }
      if(strpos($format, "{HEALTH}")) {
        $health = $player->getHealth();
        $format = str_replace("{HEALTH}", $health, $format); }
      if(strpos($format, "{MAX_HEALTH}")) {
        $maxHealth = $player->getMaxHealth();
        $format = str_replace("{MAX_HEALTH}", $maxHealth, $format); }
      if(strpos($format, "{MONEY}")) {
        $money = EconomyAPI::getInstance()->myMoney($player);
        $format = str_replace("{MONEY}", $money, $format); }
      if(strpos($format, "{KILLS}")) {
        $kills = KDR::getInstance()->getProvider()->getPlayerKillPoints($player);
        $format = str_replace("{KILLS}", $kills, $format); }
      if(strpos($format, "{DEATHS}")) {
        $deaths = KDR::getInstance()->getProvider()->getPlayerDeathPoints($player);
        $format = str_replace("{DEATHS}", $deaths, $format); }
      if(strpos($format, "{KILL_DEATH_RATE}")) {
        $kdr = KDR::getInstance()->getProvider()->getKillToDeathRatio($player);
        $format = str_replace("{KILL_DEATH_RATE}", $kdr, $format); }
      if(strpos($format, "{FACTION}")) {
        $factionsPro = $this->getServer()->getPluginManager()->getPlugin("FactionsPro");
        $faction = $factionsPro->getFaction($player);
        $format = str_replace("{FACTION}", $faction, $format); }
      if(strpos($format, "{FACTION_POWER}")) {
        $factionsPro = $this->getServer()->getPluginManager()->getPlugin("FactionsPro");
        $faction = $factionsPro->getFaction($player);
        $power = $factionsPro->getFactionPower($faction);
        $format = str_replace("{FACTION_POWER}", $power, $format); }
      if(strpos($format, "{ISLAND_NAME}")) {
        $name = SkyBlock::getInstance()->getIslandName($player);
        $format = str_replace("{ISLAND_NAME}", $name, $format); }
      if(strpos($format, "{ISLAND_SIZE}")) {
        $name = SkyBlock::getInstance()->getSize($player);
        $format = str_replace("{ISLAND_VALUE}", $value, $format); }
      if(strpos($format, "{ISLAND_RANK}")) {
        $name = SkyBlock::getInstance()->calcRank($player);
        $format = str_replace("{ISLAND_RANK}", $rank, $format); }
      if(strpos($format, "{ISLAND_VALUE}")) {
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

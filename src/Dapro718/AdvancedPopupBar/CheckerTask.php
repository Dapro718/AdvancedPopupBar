<?php

declare(strict_types=1);

namespace Dapro718\AdvancedPopupBar;

use pocketmine\scheduler\Task;
use pocketmine\scheduler\TaskScheduler;
use Dapro718\AdvancedPopupBar\UpdateTask;
use Dapro718\AdvancedPopupBar\PopupMain;

class CheckerTask extends Task {

  public $plugin;
  public $server;
  public $config;
  
  public function __construct(PopupMain $plugin) {
   $this->plugin = $plugin;
   $this->server = $plugin->getServer();
   $this->config = $plugin->getConfig();
  }
 
  public function onRun(int $tick) {
    $format = $this->config->get("popup-format");
    $interval = $this->config->get("update-interval");
      if(strpos($format, "{PLAYER_ONLINE_TIME}")) {
        $onlineTime = $this->getServer()->getPluginManager()->getPlugin("OnlineTime");
        if($onlineTime === null) {
          $this->server->getLogger()->error("Could not find dependency: OnlineTime. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{MONEY}")) {
        $economyapi = $this->server->getPluginManager()->getPlugin("EconomyAPI");
        if($economyapi === null) {
          $this->server->getLogger()->error("Could not find dependency: EconomyAPI. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{KILLS}")) {
        $kdr = $this->server->getPluginManager()->getPlugin("KDR");
        if($kdr === null) {
          $this->server->getLogger()->error("Could not find dependency: KDR. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{DEATHS}")) {
        $kdr = $this->server->getPluginManager()->getPlugin("KDR");
        if($kdr === null) {
          $this->server->getLogger()->error("Could not find dependency: KDR. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{KILL_DEATH_RATE}")) {
        $kdr = $this->server->getPluginManager()->getPlugin("KDR");
        if($kdr === null) {
          $this->server->getLogger()->error("Could not find dependency: KDR. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{FACTION}")) {
        $factionsPro = $this->getServer()->getPluginManager()->getPlugin("FactionsPro");
        if($factionsPro === null) {
          $this->server->getLogger()->error("Could not find dependency: FactionsPro. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{FACTION_POWER}")) {
        $factionsPro = $this->getServer()->getPluginManager()->getPlugin("FactionsPro");
        if($factionsPro === null) {
          $this->server->getLogger()->error("Could not find dependency: FactionsPro. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{ISLAND_NAME}")) {
        $skyblock = $this->server->getPluginManager()->getPlugin("RedSkyBlock");
        if($skyblock === null) {
          $this->server->getLogger()->error("Could not find dependency: RedSkyBlock. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{ISLAND_SIZE}")) {
        $skyblock = $this->server->getPluginManager()->getPlugin("RedSkyBlock");
        if($skyblock === null) {
          $this->server->getLogger()->error("Could not find dependency: RedSkyBlock. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{ISLAND_RANK}")) {
        $skyblock = $this->server->getPluginManager()->getPlugin("RedSkyBlock");
        if($skyblock === null) {
          $this->server->getLogger()->error("Could not find dependency: RedSkyBlock. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(strpos($format, "{ISLAND_VALUE}")) {
        $skyblock = $this->server->getPluginManager()->getPlugin("RedSkyBlock");
        if($skyblock === null) {
          $this->server->getLogger()->error("Could not find dependency: RedSkyBlock. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
    $this->plugin->getScheduler()->sheduleRepeatingTask(new UpdateTask($this->plugin), $interval * 20);
  }
}

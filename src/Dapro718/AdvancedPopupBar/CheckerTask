<?php

declare(strict_types=1);

namespace Dapro718\AdvancedPopupBar;

use pocketmine\scheduler\Task;
use Dapro718\AdvancedPopupBar\Main;

class CheckerTask extends Task {

  public $plugin;
  public $server;
  public $config;
  
  public function __construct(Main $plugin) {
   $this->plugin = $plugin;
   $this->server = $plugin->getServer();
   $this->config = $plugin->getConfig();
  }
 
  public onRun(int $tick) {
      if(in_array("{PLAYER_ONLINE_TIME}", $format, true)) {
        $onlineTime = $this->getServer()->getPluginManager()->getPlugin("OnlineTime");
        if($onlineTime === null) {
          $this->server->getLogger()->error("Could not find dependency: OnlineTime. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{MONEY}", $format, true)) {
        $economyapi = $this->server->getPluginManager()->getPlugin("EconomyAPI")
        if($economyapi === null) {
          $this->server->getLogger()->error("Could not find dependency: EconomyAPI. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{KILLS}", $format, true)) {
        $kdr = $this->server->getPluginManager()->getPlugin("KDR")
        if($kdr === null) {
          $this->server->getLogger()->error("Could not find dependency: KDR. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{DEATHS}", $format, true)) {
        $kdr = $this->server->getPluginManager()->getPlugin("KDR")
        if($kdr === null) {
          $this->server->getLogger()->error("Could not find dependency: KDR. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{KILL_DEATH_RATE}", $format, true)) {
        $kdr = $this->server->getPluginManager()->getPlugin("KDR")
        if($kdr === null) {
          $this->server->getLogger()->error("Could not find dependency: KDR. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{FACTION}", $format, true)) {
        $factionsPro = $this->getServer()->getPluginManager()->getPlugin("FactionsPro");
        if($factionsPro === null) {
          $this->server->getLogger()->error("Could not find dependency: FactionsPro. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{FACTION_POWER}", $format, true)) {
        $factionsPro = $this->getServer()->getPluginManager()->getPlugin("FactionsPro");
        if($factionsPro === null) {
          $this->server->getLogger()->error("Could not find dependency: FactionsPro. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{ISLAND_NAME}", $format, true)) {
        $skyblock = $this->server->getPluginManager()->getPlugin("RedSkyBlock");
        if($skyblock === null) {
          $this->server->getLogger()->error("Could not find dependency: RedSkyBlock. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{ISLAND_SIZE}", $format, true)) {
        $skyblock = $this->server->getPluginManager()->getPlugin("RedSkyBlock");
        if($skyblock === null) {
          $this->server->getLogger()->error("Could not find dependency: RedSkyBlock. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{ISLAND_RANK}", $format, true)) {
        $skyblock = $this->server->getPluginManager()->getPlugin("RedSkyBlock");
        if($skyblock === null) {
          $this->server->getLogger()->error("Could not find dependency: RedSkyBlock. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
      if(in_array("{ISLAND_VALUE}", $format, true)) {
        $skyblock = $this->server->getPluginManager()->getPlugin("RedSkyBlock");
        if($skyblock === null) {
          $this->server->getLogger()->error("Could not find dependency: RedSkyBlock. Please install this plugin.");
          $this->server->getPluginManager()->disablePlugin($this->plugin); } }
  }
    

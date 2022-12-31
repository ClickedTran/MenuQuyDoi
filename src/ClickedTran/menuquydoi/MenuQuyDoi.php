<?php

namespace ClickedTran\menuquydoi;

use pocketmine\utils\Config;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase as PB;
use pocketmine\Server;
use pocketmine\event\Listener as L;

use ClickedTran\menuquydoi\command\MenuQuyDoiCommand;
use ClickedTran\menuquydoi\ui\UIManager;

class MenuQuyDoi extends PB implements L{
 /** @var MenuQuyDoi */
	public static $instance;

	public static function getInstance() : self {
		return self::$instance;
	}

 public function onEnable(): void{
	
 //Plugin Money For Your Server
   foreach([
            "PointAPI" => "PointAPI",
            "CoinAPI" => "CoinAPI",
            "EconomyAPI" => "EconomyAPI",
            "FormAPI" => "FormAPI"] as $plugins){
                if(!$this->getServer()->getPluginManager()->getPlugin($plugins)){
                    $this->getLogger()->error("Bạn chưa cài plugin ". $plugins .". Vui lòng cài đủ 4 plugin: EconomyAPI, PointAPI, CoinAPI, FormAPI để plugin có thể hoạt động trơn tru.");
                    $this->getServer()->getPluginManager()->disablePlugin($this);
                    return;
            }
        }
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register("menuquydoi", new MenuQuyDoiCommand($this));
        $this->getLogger()->info("Plugin đã được bật!");
        $this->getLogger()->info("§c Author By ClickedTran");
        $this->getLogger()->info("§c Copyright By KingNightVN");
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->saveDefaultConfig();
        
        self::$instance = $this;
     }
 }

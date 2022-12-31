<?php 

namespace ClickedTran\menuquydoi\command;

use pocketmine\command\{
     Command,
     CommandSender
};
use pocketmine\player\Player;
use pocketmine\plugin\PluginOwned;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\Server;

use ClickedTran\menuquydoi\MenuQuyDoi;
use ClickedTran\menuquydoi\ui\UIManager;
use ClickedTran\menuquydoi\ui\CoinUIManager;
use ClickedTran\menuquydoi\ui\ListPriceUIManager;
use ClickedTran\menuquydoi\ui\PointUIManager;
use ClickedTran\menuquydoi\ui\MoneyUIManager;

class MenuQuyDoiCommand extends Command implements PluginOwned{
   private MenuQuyDoi $plugin;
   
   public function __construct(MenuQuyDoi $plugin){
    $this->plugin = $plugin;
    parent::__construct("menuquydoi", "Menu Quy Đổi Tiền Tệ Trong Server!", "/menuquydoi help");
    $this->setPermission("menuquydoi.command");
  }
  
  public function execute(CommandSender $sender, String $label, Array $args){
    if(!$sender instanceof Player){
        $sender->sendMessage("§cUse In-game, Please!");
        return true;
    }
    if(isset($args[0])){
      switch($args[0]){
        case "help":
        case "?":
         if($sender->hasPermission("menuquydoi.command.help")){
             $sender->sendMessage("§6=====§aMenuQuyDoi Help§6=====");
             $sender->sendMessage("§bSử dụng: §c/menuquydoi changecoin§b để mở menu đổi Coin");
             $sender->sendMessage("§bSử dụng: §c/menuquydoi changepoint§b để mở menu đổi Point");
             $sender->sendMessage("§bSử dụng: §c/menuquydoi changemoney§b để mở menu đổi Money");
             $sender->sendMessage("§bSử dụng: §c/menuquydoi list§b để mở bảng giá đổi Money");
             $sender->sendMessage("§6=====§bThank For Reading§6=====");
          }else{
             $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("No-Permission"));
        }
       break;
       
      case "listprice":
      case "list":
      case "price":
       if($sender->hasPermission("menuquydoi.command.price")){
          $ui = new ListPriceUIManager();
          $ui->listExchange($sender);
       }else{
          $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("No-Permission"));
       }
      break;

      case "changecoin":
      case "ccoin":
      case "cc":
       if($sender->hasPermission("menuquydoi.command.coin")){
          $ui = new CoinUIManager();
          $ui->menuChangeCoin($sender);
       }else{
          $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("No-Permission"));
       }
      break;
      
      case "changepoint":
      case "cpoint":
      case "cp":
       if($sender->hasPermission("menuquydoi.command.point")){
          $ui = new PointUIManager();
          $ui->menuChangePoint($sender);
       }else{
          $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("No-Permission"));
       }
      break;
     
      case "changemoney":
      case "cmoney":
      case "cm":
       if($sender->hasPermission("menuquydoi.command.money")){
          $ui = new MoneyUIManager();
          $ui->menuChangeMoney($sender);
       }else{
          $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("No-Permission"));
       }
      break;
      
      default:
           if($sender->hasPermission("menuquydoi.command.help")){
              $sender->sendMessage("§l§cVui lòng sử dụng lệnh §b/menuquydoi help§c để biết thêm chi tiết");
             }else{
                        $ui = new UIManager();
                        $ui->menuShop($sender);
                    }
                break;
    		}
    	}else{
	    if($sender->hasPermission("menuquydoi.command.help")){
              $sender->sendMessage("§l§cVui lòng sử dụng lệnh §b/menuquydoi help§c để biết thêm chi tiết");
	    }else{
                $ui = new UIManager();
                $ui->menuShop($sender);
      }
    }
  }
  
  public function getOwningPlugin(): MenuQuyDoi{
   return $this->plugin;
  }
}
   

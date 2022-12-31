<?php

namespace ClickedTran\menuquydoi\ui;

use pocketmine\player\Player;
use pocketmine\Server;

use jojoe77777\FormAPI\{
        SimpleForm,
        CustomForm,
        ModalForm
};

use ClickedTran\menuquydoi\MenuQuyDoi;
use ClickedTran\menuquydoi\command\MenuQuyDoiCommand;

class UIManager {
    public function menuShop(Player $sender){
     $form = new SimpleForm(function(Player $sender, $data){
      $result = $data;
      switch($result){
       case 0:
       break;
       case 1:
        if($sender->hasPermission("menuquydoi.command.coin");
          $ui = new CoinUIManager();
          $ui->menuChangeCoin($sender);
        }
       break;
       
       case 2:
        if($sender->hasPermission("menuquydoi.command.point");
          $ui = new PointUIManager();
          $ui->menuChangePoint($sender);
         }
       break;
       
       case 3:
        if($sender->hasPermission("menuquydoi.command.money");
            $ui = new MoneyUIManager();
            $ui->menuChangeMoney($sender);
         }
      break;
      
      case 4:
       if($sender->hasPermission("menuquydoi.command.price"){
           $this->price($sender);
       }
     }
   });
  
  $form->setTitle(MenuQuyDoi::getInstance()->getConfig()->get("Title-Menu"));
  $form->setContent("". str_replace(["{player}", "{line}", "{coin}", "{point}", "{money}"], ["\n", MenuQuyDoi::getInstance()->getServer()->getName(), CointAPI::getInstance()->myCoin($sender), PointAPI::getInstance()->myPoint($sender), EconomyAPI::getInstace()->myMoney($sender)], MenuQuyDoi::getInstance()->getConfig->get("Content-Menu")));
  $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Exit"));
  $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Change-Coin"));
  $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Change-Point"));
  $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Change-Money"));
  $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Price"));
  $form->sendToPlayer($sender);
  }
}

<?php

namespace ClickedTran\menuquydoi\ui;

use pocketmine\player\Player;
use pocketmine\Server;

use jojoe77777\FormAPI\{
   SimpleForm,
   CustomForm
};

use onebone\economyapi\EconomyAPI;
use onebone\pointapi\PointAPI;

use ClickedTran\menuquydoi\ui\UIManager;
use ClickedTran\menuquydoi\MenuQuyDoi;

class PointUIManager {
     public function menuChangePoint(Player $sender){
       $form = new CustomForm(function(Player $sender, ?array $data){
         if($data[0] === null){
            $ui = new UIManager();
            $ui->menuShop($sender);
            return true;
          }
          $pricepoint = MenuQuyDoi::getInstance()->getConfig()->get("Price-Change-Point") * $data[0];
          $money = EconomyAPI::getInstance()->myMoney($sender);
          if($money < $pricepoint){
              $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("Not-enough-money"));
            }else{
               EconomyAPI::getInstance()->reduceMoney($sender, $pricepoint);
               PointAPI::getInstance()->addPoint($sender, $data[0]);
               $sender->sendMessage(str_replace(["{amount}", "{price}", "{line}"], [$data[0], $pricepoint, "\n"], MenuQuyDoi::getInstance()->getConfig()->get("Succes-Change-Point")));
          }
         });
          $form->setTitle(MenuQuyDoi::getInstance()->getConfig()->get("Title-Menu-Point"));
          $form->addInput(MenuQuyDoi::getInstance()->getConfig()->get("Amount-Change-Point"));
          $form->sendToPlayer($sender);
       }
}
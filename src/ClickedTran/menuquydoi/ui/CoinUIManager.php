<?php

namespace ClickedTran\menuquydoi\ui;

use pocketmine\player\Player;
use pocketmine\Server;

use jojoe77777\FormAPI\{
   SimpleForm,
   CustomForm
};

use onebone\coinapi\CoinAPI;
use onebone\pointapi\PointAPI;

use ClickedTran\menuquydoi\ui\UIManager;
use ClickedTran\menuquydoi\MenuQuyDoi;

class CoinUIManager {
    
     public function menuChangeCoin(Player $sender){
       $form = new CustomForm(function(Player $sender, ?array $data){
         if($data[0] === null){
            $ui = new UIManager();
            $ui->menuShop($sender);
            return true;
          }
          $pricecoin = MenuQuyDoi::getInstance()->getConfig()->get("Price-Change-Coin") * $data[0];
          $point = PointAPI::getInstance()->myPoint($sender);
          if($point < $pricecoin){
              $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("Not-enough-point"));
            }else{
               PointAPI::getInstance()->reducePoint($sender, $pricecoin);
               CoinAPI::getInstance()->addCoin($sender, $data[0]);
               $sender->sendMessage(str_replace(["{amount}", "{price}", "{line}"], [$data[0], $pricecoin, "\n"], MenuQuyDoi::getInstance()->getConfig()->get("Succes-Change-Coin")));
          }
         });
          $form->setTitle(MenuQuyDoi::getInstance()->getConfig()->get("Title-Menu-Coin"));
          $form->addInput(MenuQuyDoi::getInstance()->getConfig()->get("Amount-Change-Coin"));
          $form->sendToPlayer($sender);
       }
}
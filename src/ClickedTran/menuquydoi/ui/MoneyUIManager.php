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
use onebone\coinapi\CoinAPI;

use ClickedTran\menuquydoi\ui\UIManager;
use ClickedTran\menuquydoi\MenuQuyDoi;

class MoneyUIManager {
     public function menuChangeMoney(Player $sender){
       $form = new SimpleForm(function(Player $sender, $data){
        $result = $data;
         if($result === null){
             return true;
          }
          switch($result){
          case 0:
          break;
          case 1:
          $this->menuChangeMoneyFromPoint($sender);
          break;
          case 2:
          $this->menuChangeMoneyFromCoin($sender);
          break;
         }
       });
       $form->setTitle(MenuQuyDoi::getInstance()->getConfig()->get("Title-Menu-Money"));
       $form->setContent("". str_replace(["{player}", "{coin}", "{point}", "{money}", "{line}"], [$sender->getName(), CoinAPI::getInstance()->myCoin($sender), PointAPI::getInstance()->myPoint($sender), EconomyAPI::getInstance()->myMoney($sender), "\n"], MenuQuyDoi::getInstance()->getConfig()->get("Content-Menu-Money")));
       $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Exit"));
       $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Exchange-From-Point"));
       $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Exchange-From-Coin"));
       $form->sendToPlayer($sender);
       }
       
       public function menuChangeMoneyFromPoint(Player $sender){
       $form = new CustomForm(function(Player $sender, ?array $data){
         if($data[0] === null){
            return true;
          }
          $price = MenuQuyDoi::getInstance()->getConfig()->get("Price-Exchange-Money-From-Point") * $data[0];
          $amount_money  = MenuQuyDoi::getInstance()->getConfig()->get("Amount-Money-From-Point") * $data[0];
          $point = PointAPI::getInstance()->myPoint($sender);
          if($point < $price){
              $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("Not-enough-point"));
            }else{
               PointAPI::getInstance()->reducePoint($sender, $price);
               EconomyAPI::getInstance()->addMoney($sender, $amount_money);
               $sender->sendMessage(str_replace(["{amount}", "{price}", "{line}"], [$amount_money, $price, "\n"], MenuQuyDoi::getInstance()->getConfig()->get("Succes-Change-Money-From-Point")));
          }
         });
          $form->setTitle(MenuQuyDoi::getInstance()->getConfig()->get("Title-Exchange-From-Point"));
          $form->addInput(MenuQuyDoi::getInstance()->getConfig()->get("Amount-Exchange-Money-From-Point"));
          $form->sendToPlayer($sender);
       }
       
       public function menuChangeMoneyFromCoin(Player $sender){
       $form = new CustomForm(function(Player $sender, ?array $data){
         if($data[0] === null){
            return true;
          }
          $price = MenuQuyDoi::getInstance()->getConfig()->get("Price-Exchange-Money-From-Coin") * $data[0];
          $amount_money  = MenuQuyDoi::getInstance()->getConfig()->get("Amount-Money-From-Coin") * $data[0];
          $coin = CoinAPI::getInstance()->myCoin($sender);
          if($coin < $price){
              $sender->sendMessage(MenuQuyDoi::getInstance()->getConfig()->get("Not-enough-coin"));
            }else{
               CoinAPI::getInstance()->reduceCoin($sender, $price);
               EconomyAPI::getInstance()->addMoney($sender, $amount_money);
               $sender->sendMessage(str_replace(["{amount}", "{price}", "{line}"], [$amount_money, $price, "\n"], MenuQuyDoi::getInstance()->getConfig()->get("Succes-Exchange-Money-From-Coin")));
          }
         });
          $form->setTitle(MenuQuyDoi::getInstance()->getConfig()->get("Title-Exchange-Money-From-Coin"));
          $form->addInput(MenuQuyDoi::getInstance()->getConfig()->get("Amount-Exchange-Money-From-Coin"));
          $form->sendToPlayer($sender);
       }
}
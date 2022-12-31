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

class ListPriceUIManager {
    
     public function listExchange(Player $sender){
       $form = new SimpleForm(function(Player $sender, $data){
         if($data === null){
            return true;
          }
          switch($data){
           case 0:
           break;
          }
         });
          $form->setTitle(MenuQuyDoi::getInstance()->getConfig()->get("Title-List-Price"));
          $form->setContent("". str_replace(["{line}"], ["\n"], MenuQuyDoi::getInstance()->getConfig()->get("List-Price-Exchange")));
          $form->addButton(MenuQuyDoi::getInstance()->getConfig()->get("Button-Exit"));
          $form->sendToPlayer($sender);
       }
}
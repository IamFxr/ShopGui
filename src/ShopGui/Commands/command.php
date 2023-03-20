<?php

declare(strict_types=1);

namespace ShopGui\Commands;

use ShopGui\ShopGui;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class command extends Command
{
public function __construct()
    {
        parent::__construct('shopgui', 'open the shopgui!');
     }
 /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {

if (!isset($args[0])) {

ShopGui::OpenShopFormat($sender);
return;
       }
            
            switch ($args[0]) {
                case "blocks":
                   
ShopGui::OpenBlockShop($sender);

break;

case "equipment":

ShopGui::OpenEquipmentShop($sender);

break;

case "food":

ShopGui::OpenFoodShop($sender);
break;

          }
      } 

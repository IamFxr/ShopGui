<?php

declare(strict_types=1);

namespace ShopGui\Commands;

use ShopGui\SellGui;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class command extends Command
{
public function __construct()
    {
        parent::__construct('sellgui', 'open the sellgui!');
     }
 /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {

if (!isset($args[0])) {

SellGui::OpenSellFormat($sender);
return;
       }
            
            switch ($args[0]) {
                case "armor":
                   
SellGui::OpenArmorsSell($sender);

break;

case "ores":

SellGui::OpenOresSell($sender);

break;

case "foof":

SellGui::OpenFoodSell($sender);
break;

          }
      } 

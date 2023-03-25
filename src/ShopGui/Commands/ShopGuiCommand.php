<?php

declare(strict_types=1);

namespace ShopGui\Commands;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\type\InvMenuTypeIds;
use pocketmine\inventory\Inventory;
use pocketmine\item\StringItem;
use pocketmine\item\VanillaItems;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use ShopGui\Main;

class ShopGuiCommand extends Command {
    public function __construct() {
        parent::__construct('shopgui', 'open the shopgui!');
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if($sender instanceof Player) {
            if(isset($args[0])) {
                switch($args[0]) {
                    case "buy":
                        $menu = InvMenu::create(InvMenuTypeIds::TYPE_CHEST);
                        $menu->setName(TextFormat::colorize("&l&aBUY SHOP"));
                        $item = VanillaItems::SKELETON_SKULL();
                        $item->setCustomName("TESTTT");
                        $item->setLore(["LMAOOO"]);
                        $menu->getInventory()->addItem($item);
                        $menu->setInventoryCloseListener(function(Player $player, Inventory $inventory) :void{
                            $player->removeCurrentWindow();
                        });
                        $menu->send($sender);
                        break;
                    case "sell":
                        // Mostrar gui de venta
                        break;
                    default:
                        $sender->sendMessage(TextFormat::RED. "Argumentos insuficientes. Usa /shopgui [buy/sell]");
                }
            } else {
                $sender->sendMessage(TextFormat::RED. "Argumentos insuficientes. Usa /shopgui [buy/sell]");
            }
        } else {
            $sender->sendMessage(TextFormat::RED. "Ejecuta el comando desde el juego");
        }
    }

    /*public function closeInventory() :\Closure {
        return function(Player $player, Inventory $inventory) :void {
            $loots = [];
            foreach($inventory->getContents() as $item) {
                $loots[] = json_encode($item);
            }
            Main::getInstance()->config->set("items", $loots);
            Main::getInstance()->config->save();
        };
    }*/

}
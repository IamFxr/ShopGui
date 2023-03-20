<?php

declare(strict_types=1);

namespace ShopGui;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use muqsit\invmenu\type\InvMenuTypeIds;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class ShopGui extends PluginBase
{
    }

    public function onEnable(): void
    {
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")
$this->getLogger()->info("Plugin Enable") 
}

public function openShopFormat(Player $player): void
    {
        $menu = InvMenu::create(InvMenuTypeIds::TYPE_DOUBLE_CHEST);
$menu->setListener(function(InvMenuTransaction $transaction): InvMenuTransactionResult {
            $player = $transaction->getPlayer();
            $item = $transaction->getItemClicked();
} 

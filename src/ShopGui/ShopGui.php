<?php

namespace ShopGui;

use Closure;



use pocketmine\player\Player;



use muqsit\invmenu\InvMenu;

use muqsit\invmenu\type\InvMenuTypeIds;

use muqsit\invmenu\transaction\InvMenuTransaction;

use muqsit\invmenu\transaction\InvMenuTransactionResult;



use pocketmine\block\VanillaBlocks;

use pocketmine\item\VanillaItems;





use ShopGui\PluginUtils;



class ShopGui {



    

     

    public function openShopFormat(Player $player): void{

        $menu = InvMenu::create(InvMenuTypeIds::TYPE_CHEST);

        $inv = $menu->getInventory();

        $menu->setName("§l§gShopGui");

        $menu->setListener(Closure::fromCallable([$this, "ShopFormat"]));



        

        for($i = 0;$i < 27;$i++){

            if(!in_array($i, [11, 12, 13])){

                $inv->setItem($i, VanillaBlocks::IRON_BARS()->asItem()->setCustomName("§l§gVentrix§r§fMc"));

            }

        }



        $inv->setItem(11, VanillaItems::DIAMOND_CHESTPLATE()->setCustomName("§lTienda de Armaduras")->setLore(["§rClick para ir a la tienda de armaduras"]));

        $inv->setItem(12, VanillaItems::STONE()->setCustomName("§lTienda de Bloques")->setLore(["§rClick para ir a la tienda de Bloques"]));

        $inv->setItem(13, VanillaItems::COOKED_CHICKEN()->setCustomName("§lTienda de Comida")->setLore(["§rClick para ir a la tienda de Comida"]));
        

        $menu->send($player);

    }



    /**

     * @param InvMenuTransaction $transaction

     * @return InvMenuTransactionResult

     */

    public function getShop(InvMenuTransaction $transaction): InvMenuTransactionResult{

        $player = $transaction->getPlayer();

        $action = $transaction->getAction();

        switch($action->getSlot()){

            case 11: 

                if($player->hasPermission("shop.perm")){

                    $this->OpenEquipmentShop($player);

                    PluginUtils::PlaySound($player, "random.click", 1, 1);

                

                    $player->removeCurrentWindow();

                    

                }

            break;



            case 12: 

                if($player->hasPermission("shop.perm")){

                    $this->OpenBlockShop($player);

                    PluginUtils::PlaySound($player, "random.click", 1, 1);

                }
                

            break;



            case 13: 

                if($player->hasPermission("shop.perm")){

                    $this->OpenFoodShop($player);

                    PluginUtils::PlaySound($player, "random.click", 1, 1);

             }

            break;

}

         
              
        



        return $transaction->discard();

    }

}

<?php



namespace ShopGui\entity;

use pocketmine\entity\Entity;
use pocketmine\entity\Human;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\item\VanillaItems;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\permission\DefaultPermissions;
use pocketmine\Server;
use pocketmine\world\World;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;
use ShopGui\Main;
class ShopEntity extends Human {



    public static function create(Player $player) : self {



        $nbt = CompoundTag::create()->setTag("Pos", new ListTag([



            new DoubleTag($player->getLocation()->x),



            new DoubleTag($player->getLocation()->y),



            new DoubleTag($player->getLocation()->z)



        ]))->setTag("Motion", new ListTag([



            new DoubleTag($player->getMotion()->x),



            new DoubleTag($player->getMotion()->y),



            new DoubleTag($player->getMotion()->z)



        ]))->setTag("Rotation", new ListTag([



            new FloatTag($player->getLocation()->yaw),



            new FloatTag($player->getLocation()->pitch)



        ]));



        return new self($player->getLocation(), $player->getSkin(), $nbt);

public function onUpdate(int $currentTick) : bool {



        $parent = parent::onUpdate($currentTick);



        

        $tag = TextFormat::colorize(Main::getInstance()->getConfig()->get("shop_title"));


$format = Main::getInstance()->getConfig()->get("shop_text");

        }
        
$this->setNameTag($tag);



        $this->setNameTagAlwaysVisible(true);



        $this->setImmobile(true);



        $this->setScale(1.0);



        return $parent;

    }
    
public function attack(EntityDamageEvent $source) : void {

        $source->cancel();

        if (!$source instanceof EntityDamageByEntityEvent) {

            return;

        }

        $damager = $source->getDamager();

        if (!$damager instanceof Player) {

            return;

        }

        if ($damager->getInventory()->getItemInHand(VanillaBlocks::MINECRAFT_AIR()) {

            

                $this->openShopFormat();


            } else {
                $hit = ($damager->getInventory()->getItemInHand(VanillaBlocks::MINECRAFT_AIR());
                
if ($hit === null){

$this->sendMessage("Debes darle un hit con la mano");


} 
return;

            

        }

    }
    

public function onKill(EntityDamageEvent $source) : void {

        $source->cancel();

        if (!$source instanceof EntityDamageByEntityEvent) {

            return;

        }

        $damager = $source->getDamager();

        if (!$damager instanceof Player) {

            return;

        }

        if ($damager->getInventory()->getItemInHand()->getId() === 257) {

            if ($damager->hasPermission(DefaultPermissions::ROOT_OPERATOR)) {

                $this->kill();

            }

            return;

        }

    }

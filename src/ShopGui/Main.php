<?php

namespace ShopGui;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use ShopGui\Commands\ShopGuiCommand;
use ShopGui\Commands\SellGuiCommand;


class Main extends PluginBase{
    
    
    
    public function onLoad(): void
    {
        self::setInstance($this);
    }

    public function onEnable(): void
    {
       Server::getInstance()->getCommandMap()->register("shopgui", new ShopGuiCommand());
Server::getInstance()->getCommandMap()->register("sellgui", new SellGuiCommand());
        $this->saveResource("config.yml");

//Registrar Entidades

        
        EntityFactory::getInstance()->register(ShopEntity::class, function (World $world, CompoundTag $nbt) : ShopEntity {
            return new ShopEntity (EntityDataHelper::parseLocation($nbt, $world), ShopEntity::parseSkinNBT($nbt), $nbt);
        }, ['ShopEntity']);
       
    }
   }
    

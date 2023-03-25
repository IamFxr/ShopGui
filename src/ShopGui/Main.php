<?php

namespace ShopGui;

use muqsit\invmenu\InvMenuHandler;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use ShopGui\Commands\ShopGuiCommand;

class Main extends PluginBase implements Listener {

    private static Main $instance;

    public function onEnable(): void {

        // Registrar eventos
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);

        // Registrar InvMenu
        if(!InvMenuHandler::isRegistered()) {
            InvMenuHandler::register($this);
        }

        // Registrar comando
        Server::getInstance()->getCommandMap()->register("shopgui", new ShopGuiCommand());

        // Establecimiento de instancia Main
        self::$instance = $this;
    }

    public static function getInstance() : Main {
        return self::$instance;
    }



}
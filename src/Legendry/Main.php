<?php

namespace Legendry;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase {

      public function onEnable(){
        $this->getServer()->getLogger()->notice("§aAktiviert!");
    }
         
       public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {

              switch($cmd->getName() ) {

                     case "feed":
                            if ($sender instanceof Player) {
                                      if ($sender->hasPermission("use.feed")){
                                            $sender->setFood(20);
                                              $sender->sendMessage(TF::AQUA."Deine Essen Leiste wurde wieder aufgefüllt.");
                                      }
                             }
                    break;
                    
                    case "sword":
                            if ($sender instanceof Player) {
                                          $enchantment = Enchantment::getEnchantment(0);
                                          $enchantInstance = new EnchantmentInstance($enchantment, 4);
                                          $sword = Item::get(276, 0, 1);
                                          $sword->addEnchantment($enchantInstance);
                                          $sender->getInventory()->addItem($sword);
                             }
                    break;

                    case "heal":
                           if ($sender instanceof Player) {
                                    if($sender->hasPermission("use.heal")){
                                         $sender->setHealth(20);
                                           $sender->sendMessage(TF::AQUA."Deine Herzen Leiste wurde wieder aufgefüllt.");
                                    }
                                 }
                        break;

            }
            return true;

      }

}                
<?php

alvin0319\SimpleMapRenderer\item;

use pocketmine\utils\CloningRegistryTrait;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemTypeIds;
class ItemPlus {
  use CloningRegistryTrait;

  protected static function setup(): void {
    self::_registryRegister('filled_map', new FilledMap(new ItemIdentifier(ItemTypeIds::newId()), "Filled Map"));   
  }
}

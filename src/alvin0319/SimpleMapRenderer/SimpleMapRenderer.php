<?php

/*
 * MIT License
 *
 * Copyright (c) 2020 - 2021 alvin0319
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

declare(strict_types=1);

namespace alvin0319\SimpleMapRenderer;

use alvin0319\SimpleMapRenderer\item\ItemPlus;
use alvin0319\SimpleMapRenderer\item\FilledMap;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginException;
use pocketmine\utils\Config;
use pocketmine\inventory\CreativeInventory;
use pocketmine\item\StringToItemParser;
use pocketmine\world\format\io\GlobalItemDataHandlers;
use RuntimeException;

use function is_dir;
use function mkdir;

class SimpleMapRenderer extends PluginBase{
	/** @var SimpleMapRenderer|null */
	private static $instance = null;
	
	protected MapFactory $mapFactory;
	
	protected Config $config;

	public function onLoad() : void{
		self::$instance = $this;
	}

	public static function getInstance() : SimpleMapRenderer{
		return self::$instance;
	}

	public function onEnable() : void{
		if(!is_dir($dir = $this->getDataFolder() . "images/")){
			mkdir($dir);
		}
		if(!is_dir($dir = $this->getDataFolder() . "data/")){
			mkdir($dir);
		}
		$this->saveResource("config.json");
		$this->config = new Config($this->getDataFolder() . "config.json", Config::JSON);
		$this->mapFactory = new MapFactory();

		GlobalItemDataHandlers::getDeserializer()->map("minecraft:filled_map", fn() => clone ItemPlus::FILLED_MAP());
        GlobalItemDataHandlers::getSerializer()->map(ItemPlus::FILLED_MAP(), fn() => new SavedItemData("minecraft:filled_map"));
        StringToItemParser::getInstance()->register("minecraft:filled_map", fn() => clone ItemPlus::FILLED_MAP());
        CreativeInventory::getInstance()->add(ItemPlus::FILLED_MAP());

		$this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
	}

	public function onDisable() : void{
		$this->mapFactory->save();
		$this->getConfig()->save();
	}

	public function getConfig() : Config{
		return $this->config;
	}
}

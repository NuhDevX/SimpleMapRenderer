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

namespace alvin0319\SimpleMapRenderer\util;

use pocketmine\block\Block;
use pocketmine\block\BlockTypeIds;
use pocketmine\block\utils\DyeColor;
use pocketmine\block\utils\WoodType;
use pocketmine\block\VanillaBlocks;
use pocketmine\utils\Color;

final class MapUtil{

	public const COLOR_BLOCK_WHITE = 0;
	public const COLOR_BLOCK_ORANGE = 1;
	public const COLOR_BLOCK_MAGENTA = 2;
	public const COLOR_BLOCK_LIGHT_BLUE = 3;
	public const COLOR_BLOCK_YELLOW = 4;
	public const COLOR_BLOCK_LIME = 5;
	public const COLOR_BLOCK_PINK = 6;
	public const COLOR_BLOCK_GRAY = 7;
	public const COLOR_BLOCK_LIGHT_GRAY = 8;
	public const COLOR_BLOCK_CYAN = 9;
	public const COLOR_BLOCK_PURPLE = 10;
	public const COLOR_BLOCK_BLUE = 11;
	public const COLOR_BLOCK_BROWN = 12;
	public const COLOR_BLOCK_GREEN = 13;
	public const COLOR_BLOCK_RED = 14;
	public const COLOR_BLOCK_BLACK = 15;

	/**
	 * Credits from Altay
	 *
	 * @param Block $block
	 *
	 * @return Color
	 * @link https://github.com/TuranicTeam/Altay/blob/stable/src/pocketmine/maps/renderer/VanillaMapRenderer.php#L172#L274
	 */
	public static function getMapColorByBlock(Block $block) : Color{
		$id = $block->getTypeId();
		
		if($id === BlockTypeIds::AIR){
			return new Color(0, 0, 0);
		}elseif($id === BlockTypeIds::GRASS || $id === BlockTypeIds::SLIME){
			return new Color(127, 178, 56);
		}elseif($id === BlockTypeIds::SAND || $id === BlockTypeIds::SANDSTONE || $id === BlockTypeIds::SANDSTONE_STAIRS || $id === BlockTypeIds::STONE_SLAB || $id === BlockTypeIds::GLOWSTONE || $id === BlockTypeIds::END_STONE || $id === BlockTypeIds::OAK_PLANKS || $id === BlockTypeIds::BIRCH_LOG || $id === BlockTypeIds::BIRCH_FENCE_GATE || $id === BlockTypeIds::BIRCH_FENCE || $id === BlockTypeIds::BIRCH_STAIRS || $id === BlockTypeIds::BIRCH_SLAB || $id === BlockTypeIds::BONE_BLOCK || $id === BlockTypeIds::END_STONE_BRICKS){
			return new Color(247, 233, 163);
		}elseif($id === BlockTypeIds::BED || $id === BlockTypeIds::COBWEB){
			return new Color(199, 199, 199);
		}elseif($id === BlockTypeIds::LAVA || $id === BlockTypeIds::TNT || $id === BlockTypeIds::FIRE || $id === BlockTypeIds::REDSTONE_WIRE){
			return new Color(255, 0, 0);
		}elseif($id === BlockTypeIds::ICE || $id === BlockTypeIds::PACKED_ICE || $id === BlockTypeIds::FROSTED_ICE){
			return new Color(160, 160, 255);
		}elseif($id === BlockTypeIds::IRON || $id === BlockTypeIds::IRON_DOOR || $id === BlockTypeIds::IRON_TRAPDOOR || $id === BlockTypeIds::IRON_BARS || $id === BlockTypeIds::BREWING_STAND || $id === BlockTypeIds::ANVIL || $id === BlockTypeIds::WEIGHTED_PRESSURE_PLATE_HEAVY){
			return new Color(167, 167, 167);
		}elseif($id === BlockTypeIds::OAK_SAPLING || $id === BlockTypeIds::OAK_LEAVES || $id === BlockTypeIds::TALL_GRASS || $id === BlockTypeIds::DEAD_BUSH || $id === BlockTypeIds::DANDELION || $id === BlockTypeIds::POPPY || $id === BlockTypeIds::SUNFLOWER || $id === BlockTypeIds::BROWN_MUSHROOM || $id === BlockTypeIds::RED_MUSHROOM || $id === BlockTypeIds::WHEAT || $id === BlockTypeIds::CARROTS || $id === BlockTypeIds::POTATOES || $id === BlockTypeIds::BEETROOTS || $id === BlockTypeIds::CACTUS || $id === BlockTypeIds::SUGARCANE || $id === BlockTypeIds::PUMPKIN_STEM || $id === BlockTypeIds::MELON_STEM || $id === BlockTypeIds::VINES || $id === BlockTypeIds::LILY_PAD){
			return new Color(0, 124, 0);
		}elseif($id === BlockTypeIds::WOOL || $id === BlockTypeIds::SNOW_LAYER || $id === BlockTypeIds::SNOW){
			// Check for white wool
			return new Color(255, 255, 255);
		}elseif($id === BlockTypeIds::CLAY || $id === BlockTypeIds::INFESTED_STONE){
			return new Color(164, 168, 184);
		}elseif($id === BlockTypeIds::DIRT || $id === BlockTypeIds::FARMLAND || $id === BlockTypeIds::GRANITE || $id === BlockTypeIds::POLISHED_GRANITE || $id === BlockTypeIds::RED_SAND || $id === BlockTypeIds::RED_SANDSTONE || $id === BlockTypeIds::RED_SANDSTONE_STAIRS || $id === BlockTypeIds::JUNGLE_LOG || $id === BlockTypeIds::JUNGLE_PLANKS || $id === BlockTypeIds::JUNGLE_FENCE_GATE || $id === BlockTypeIds::JUNGLE_FENCE || $id === BlockTypeIds::JUNGLE_STAIRS || $id === BlockTypeIds::JUNGLE_SLAB){
			return new Color(151, 109, 77);
		}elseif($id === BlockTypeIds::STONE || $id === BlockTypeIds::STONE_SLAB || $id === BlockTypeIds::COBBLESTONE || $id === BlockTypeIds::COBBLESTONE_STAIRS || $id === BlockTypeIds::COBBLESTONE_WALL || $id === BlockTypeIds::MOSSY_COBBLESTONE || $id === BlockTypeIds::ANDESITE || $id === BlockTypeIds::POLISHED_ANDESITE || $id === BlockTypeIds::BEDROCK || $id === BlockTypeIds::GOLD_ORE || $id === BlockTypeIds::IRON_ORE || $id === BlockTypeIds::COAL_ORE || $id === BlockTypeIds::LAPIS_LAZULI_ORE || $id === BlockTypeIds::DISPENSER || $id === BlockTypeIds::DROPPER || $id === BlockTypeIds::STICKY_PISTON || $id === BlockTypeIds::PISTON || $id === BlockTypeIds::MONSTER_SPAWNER || $id === BlockTypeIds::DIAMOND_ORE || $id === BlockTypeIds::FURNACE || $id === BlockTypeIds::STONE_PRESSURE_PLATE || $id === BlockTypeIds::REDSTONE_ORE || $id === BlockTypeIds::STONE_BRICKS || $id === BlockTypeIds::STONE_BRICK_STAIRS || $id === BlockTypeIds::ENDER_CHEST || $id === BlockTypeIds::HOPPER || $id === BlockTypeIds::GRAVEL || $id === BlockTypeIds::OBSERVER){
			return new Color(112, 112, 112);
		}elseif($id === BlockTypeIds::WATER){
			return new Color(64, 64, 255);
		}elseif($id === BlockTypeIds::OAK_LOG || $id === BlockTypeIds::OAK_PLANKS || $id === BlockTypeIds::OAK_FENCE || $id === BlockTypeIds::OAK_FENCE_GATE || $id === BlockTypeIds::OAK_STAIRS || $id === BlockTypeIds::OAK_SLAB || $id === BlockTypeIds::NOTE_BLOCK || $id === BlockTypeIds::BOOKSHELF || $id === BlockTypeIds::CHEST || $id === BlockTypeIds::TRAPPED_CHEST || $id === BlockTypeIds::CRAFTING_TABLE || $id === BlockTypeIds::OAK_DOOR || $id === BlockTypeIds::BIRCH_DOOR || $id === BlockTypeIds::SPRUCE_DOOR || $id === BlockTypeIds::JUNGLE_DOOR || $id === BlockTypeIds::ACACIA_DOOR || $id === BlockTypeIds::DARK_OAK_DOOR || $id === BlockTypeIds::OAK_SIGN || $id === BlockTypeIds::OAK_WALL_SIGN || $id === BlockTypeIds::OAK_PRESSURE_PLATE || $id === BlockTypeIds::JUKEBOX || $id === BlockTypeIds::OAK_TRAPDOOR || $id === BlockTypeIds::BROWN_MUSHROOM_BLOCK || $id === BlockTypeIds::BANNER || $id === BlockTypeIds::DAYLIGHT_DETECTOR){
			return new Color(143, 119, 72);
		}elseif($id === BlockTypeIds::QUARTZ_BLOCK || $id === BlockTypeIds::QUARTZ_STAIRS || $id === BlockTypeIds::DIORITE || $id === BlockTypeIds::POLISHED_DIORITE || $id === BlockTypeIds::SEA_LANTERN){
			return new Color(255, 252, 245);
		}elseif($id === BlockTypeIds::ORANGE_CONCRETE || $id === BlockTypeIds::ORANGE_CONCRETE_POWDER || $id === BlockTypeIds::ORANGE_GLAZED_TERRACOTTA || $id === BlockTypeIds::ORANGE_WOOL || $id === BlockTypeIds::ORANGE_CARPET || $id === BlockTypeIds::ORANGE_TERRACOTTA || $id === BlockTypeIds::PUMPKIN || $id === BlockTypeIds::JACK_O_LANTERN || $id === BlockTypeIds::TERRACOTTA || $id === BlockTypeIds::ACACIA_LOG || $id === BlockTypeIds::ACACIA_PLANKS || $id === BlockTypeIds::ACACIA_FENCE || $id === BlockTypeIds::ACACIA_FENCE_GATE || $id === BlockTypeIds::ACACIA_STAIRS || $id === BlockTypeIds::ACACIA_SLAB){
			return new Color(216, 127, 51);
		}elseif($id === BlockTypeIds::MAGENTA_CONCRETE || $id === BlockTypeIds::MAGENTA_CONCRETE_POWDER || $id === BlockTypeIds::MAGENTA_GLAZED_TERRACOTTA || $id === BlockTypeIds::MAGENTA_WOOL || $id === BlockTypeIds::MAGENTA_CARPET || $id === BlockTypeIds::MAGENTA_TERRACOTTA || $id === BlockTypeIds::PURPUR_BLOCK || $id === BlockTypeIds::PURPUR_STAIRS || $id === BlockTypeIds::PURPUR_SLAB){
			return new Color(178, 76, 216);
		}elseif($id === BlockTypeIds::LIGHT_BLUE_CONCRETE || $id === BlockTypeIds::LIGHT_BLUE_CONCRETE_POWDER || $id === BlockTypeIds::LIGHT_BLUE_GLAZED_TERRACOTTA || $id === BlockTypeIds::LIGHT_BLUE_WOOL || $id === BlockTypeIds::LIGHT_BLUE_CARPET || $id === BlockTypeIds::LIGHT_BLUE_TERRACOTTA){
			return new Color(102, 153, 216);
		}elseif($id === BlockTypeIds::YELLOW_CONCRETE || $id === BlockTypeIds::YELLOW_CONCRETE_POWDER || $id === BlockTypeIds::YELLOW_GLAZED_TERRACOTTA || $id === BlockTypeIds::YELLOW_WOOL || $id === BlockTypeIds::YELLOW_CARPET || $id === BlockTypeIds::YELLOW_TERRACOTTA || $id === BlockTypeIds::HAY_BALE || $id === BlockTypeIds::SPONGE){
			return new Color(229, 229, 51);
		}elseif($id === BlockTypeIds::LIME_CONCRETE || $id === BlockTypeIds::LIME_CONCRETE_POWDER || $id === BlockTypeIds::LIME_GLAZED_TERRACOTTA || $id === BlockTypeIds::LIME_WOOL || $id === BlockTypeIds::LIME_CARPET || $id === BlockTypeIds::LIME_TERRACOTTA || $id === BlockTypeIds::MELON){
			return new Color(229, 229, 51);
		}elseif($id === BlockTypeIds::PINK_CONCRETE || $id === BlockTypeIds::PINK_CONCRETE_POWDER || $id === BlockTypeIds::PINK_GLAZED_TERRACOTTA || $id === BlockTypeIds::PINK_WOOL || $id === BlockTypeIds::PINK_CARPET || $id === BlockTypeIds::PINK_TERRACOTTA){
			return new Color(242, 127, 165);
		}elseif($id === BlockTypeIds::GRAY_CONCRETE || $id === BlockTypeIds::GRAY_CONCRETE_POWDER || $id === BlockTypeIds::GRAY_GLAZED_TERRACOTTA || $id === BlockTypeIds::GRAY_WOOL || $id === BlockTypeIds::GRAY_CARPET || $id === BlockTypeIds::GRAY_TERRACOTTA || $id === BlockTypeIds::CAULDRON){
			return new Color(76, 76, 76);
		}elseif($id === BlockTypeIds::LIGHT_GRAY_CONCRETE || $id === BlockTypeIds::LIGHT_GRAY_CONCRETE_POWDER || $id === BlockTypeIds::LIGHT_GRAY_WOOL || $id === BlockTypeIds::LIGHT_GRAY_CARPET || $id === BlockTypeIds::LIGHT_GRAY_TERRACOTTA || $id === BlockTypeIds::STRUCTURE_BLOCK){
			return new Color(153, 153, 153);
		}elseif($id === BlockTypeIds::CYAN_CONCRETE || $id === BlockTypeIds::CYAN_CONCRETE_POWDER || $id === BlockTypeIds::CYAN_GLAZED_TERRACOTTA || $id === BlockTypeIds::CYAN_WOOL || $id === BlockTypeIds::CYAN_CARPET || $id === BlockTypeIds::CYAN_TERRACOTTA || $id === BlockTypeIds::PRISMARINE){
			return new Color(76, 127, 153);
		}elseif($id === BlockTypeIds::PURPLE_CONCRETE || $id === BlockTypeIds::PURPLE_CONCRETE_POWDER || $id === BlockTypeIds::PURPLE_GLAZED_TERRACOTTA || $id === BlockTypeIds::PURPLE_WOOL || $id === BlockTypeIds::PURPLE_CARPET || $id === BlockTypeIds::PURPLE_TERRACOTTA || $id === BlockTypeIds::MYCELIUM || $id === BlockTypeIds::REPEATING_COMMAND_BLOCK || $id === BlockTypeIds::CHORUS_PLANT || $id === BlockTypeIds::CHORUS_FLOWER){
			return new Color(127, 63, 178);
		}elseif($id === BlockTypeIds::BLUE_CONCRETE || $id === BlockTypeIds::BLUE_CONCRETE_POWDER || $id === BlockTypeIds::BLUE_GLAZED_TERRACOTTA || $id === BlockTypeIds::BLUE_WOOL || $id === BlockTypeIds::BLUE_CARPET || $id === BlockTypeIds::BLUE_TERRACOTTA){
			return new Color(51, 76, 178);
		}elseif($id === BlockTypeIds::BROWN_CONCRETE || $id === BlockTypeIds::BROWN_CONCRETE_POWDER || $id === BlockTypeIds::BROWN_GLAZED_TERRACOTTA || $id === BlockTypeIds::BROWN_WOOL || $id === BlockTypeIds::BROWN_CARPET || $id === BlockTypeIds::BROWN_TERRACOTTA || $id === BlockTypeIds::SOUL_SAND || $id === BlockTypeIds::DARK_OAK_LOG || $id === BlockTypeIds::DARK_OAK_PLANKS || $id === BlockTypeIds::DARK_OAK_FENCE || $id === BlockTypeIds::DARK_OAK_FENCE_GATE || $id === BlockTypeIds::DARK_OAK_STAIRS || $id === BlockTypeIds::DARK_OAK_SLAB || $id === BlockTypeIds::COMMAND_BLOCK){
			return new Color(102, 76, 51);
		}elseif($id === BlockTypeIds::GREEN_CONCRETE || $id === BlockTypeIds::GREEN_CONCRETE_POWDER || $id === BlockTypeIds::GREEN_GLAZED_TERRACOTTA || $id === BlockTypeIds::GREEN_WOOL || $id === BlockTypeIds::GREEN_CARPET || $id === BlockTypeIds::GREEN_TERRACOTTA || $id === BlockTypeIds::END_PORTAL_FRAME || $id === BlockTypeIds::CHAIN_COMMAND_BLOCK){
			return new Color(102, 127, 51);
		}elseif($id === BlockTypeIds::RED_CONCRETE || $id === BlockTypeIds::RED_CONCRETE_POWDER || $id === BlockTypeIds::RED_GLAZED_TERRACOTTA || $id === BlockTypeIds::RED_WOOL || $id === BlockTypeIds::RED_CARPET || $id === BlockTypeIds::RED_TERRACOTTA || $id === BlockTypeIds::RED_MUSHROOM_BLOCK || $id === BlockTypeIds::BRICKS || $id === BlockTypeIds::BRICK_STAIRS || $id === BlockTypeIds::ENCHANTING_TABLE || $id === BlockTypeIds::NETHER_WART_BLOCK || $id === BlockTypeIds::NETHER_WART){
			return new Color(153, 51, 51);
		}elseif($id === BlockTypeIds::BLACK_WOOL || $id === BlockTypeIds::BLACK_CARPET || $id === BlockTypeIds::BLACK_TERRACOTTA || $id === BlockTypeIds::DRAGON_EGG || $id === BlockTypeIds::COAL_BLOCK || $id === BlockTypeIds::OBSIDIAN || $id === BlockTypeIds::END_PORTAL){
			return new Color(25, 25, 25);
		}elseif($id === BlockTypeIds::GOLD || $id === BlockTypeIds::WEIGHTED_PRESSURE_PLATE_LIGHT){
			return new Color(250, 238, 77);
		}elseif($id === BlockTypeIds::DIAMOND || $id === BlockTypeIds::DARK_PRISMARINE || $id === BlockTypeIds::PRISMARINE_BRICKS || $id === BlockTypeIds::BEACON){
			return new Color(92, 219, 213);
		}elseif($id === BlockTypeIds::LAPIS_LAZULI_BLOCK){
			return new Color(74, 128, 255);
		}elseif($id === BlockTypeIds::EMERALD_BLOCK){
			return new Color(0, 217, 58);
		}elseif($id === BlockTypeIds::PODZOL || $id === BlockTypeIds::SPRUCE_LOG || $id === BlockTypeIds::SPRUCE_PLANKS || $id === BlockTypeIds::SPRUCE_FENCE || $id === BlockTypeIds::SPRUCE_FENCE_GATE || $id === BlockTypeIds::SPRUCE_STAIRS || $id === BlockTypeIds::SPRUCE_SLAB){
			return new Color(129, 86, 49);
		}elseif($id === BlockTypeIds::NETHERRACK || $id === BlockTypeIds::NETHER_QUARTZ_ORE || $id === BlockTypeIds::NETHER_BRICK_FENCE || $id === BlockTypeIds::NETHER_BRICKS || $id === BlockTypeIds::MAGMA || $id === BlockTypeIds::NETHER_BRICK_STAIRS){
			return new Color(112, 2, 0);
		}else{
			return new Color(0, 0, 0, 0);
		}
	}
}

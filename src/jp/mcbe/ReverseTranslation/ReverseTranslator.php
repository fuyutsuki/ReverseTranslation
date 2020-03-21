<?php

declare(strict_types=1);

namespace jp\mcbe\ReverseTranslation;

use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\utils\Config;

/**
 * Class ReverseTranslator
 * @package jp\mcbe\ReverseTranslation
 */
class ReverseTranslator extends Config {

    public function __construct(string $file) {
        parent::__construct($file, Config::JSON);
    }

    public function getByBlock(Block $block): string {
        $blockName = $block->getName();
        return (string)$this->get($blockName, $blockName);
    }

    public function getByItem(Item $item): string {
        $itemName = $item->getVanillaName();
        return (string)$this->get($itemName, $itemName);
    }

}
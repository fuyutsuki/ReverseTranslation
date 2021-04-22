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

    public const FILE_NAME = "3.11.0_v1.14.30.json";

    /** @var static|null */
    private static $instance = null;

    public function __construct(string $file) {
        parent::__construct($file, Config::JSON);
        self::$instance = $this;
    }

    public function fromBlock(Block $block): string {
        return "%{$this->string($block->getName())}";
    }

    public function fromItem(Item $item): string {
        return "%{$this->string($item->getVanillaName())}";
    }

    private function string(string $key): string {
        return (string)$this->get($key, $key);
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            $path = realpath(__DIR__ . "/../../../../resources/" . self::FILE_NAME);
            self::$instance = new self($path);
        }
        return self::$instance;
    }

}
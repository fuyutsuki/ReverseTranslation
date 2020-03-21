<?php

declare(strict_types=1);

namespace jp\mcbe\ReverseTranslation;

use pocketmine\plugin\PluginBase;

/**
 * Class Main
 * @package jp\mcbe\ReverseTranslation
 */
class Main extends PluginBase {

    /** @var ReverseTranslator */
    private $reverseTranslator;

    public function getReverseTranslator(): ReverseTranslator {
        return $this->reverseTranslator;
    }

    public function onLoad() {
        $description = $this->getDescription();
        $api = (string)$description->getCompatibleApis()[0];
        $version = (string)$description->getVersion();
        $file = "{$api}_v{$version}.json";
        $this->saveResource($file);
        $this->reverseTranslator = new ReverseTranslator("{$this->getDataFolder()}{$file}");
    }

}
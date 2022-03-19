<?php

declare(strict_types=1);

namespace jp\mcbe\ReverseTranslation;

use pocketmine\plugin\PluginBase;

/**
 * Class Main
 * @package jp\mcbe\ReverseTranslation
 */
class Main extends PluginBase {

    protected function onLoad(): void {
        $resource = $this->getResource(ReverseTranslator::FILE_NAME);
        $meta = stream_get_meta_data($resource);
        new ReverseTranslator($meta["uri"]);
    }

}
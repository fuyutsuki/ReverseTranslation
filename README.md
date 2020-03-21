# ReverseTranslation

> S: Server, C: Client

S: {Item, Block}Name ==[ReverseTranslation]==> NamespacedID ==[TranslationContainer]  

C: TextPacket ==[Client side i18n]==> Client locale {Item, Block}Name

## resources\{API}_v{MinecraftVersion}.json

auto generated...

## API usage

plugin.yml
```yaml
depends:
 - ReverseTranslation # fuyutsuki/ReverseTranslation
```

ExamplePlugin.php
```php
<?php

declare(strict_types=1);

use pocketmine\plugin\PluginBase;
use pocketmine\lang\TranslationContainer;
use jp\mcbe\ReverseTranslation\ReverseTranslator;

class ExamplePlugin extends PluginBase implements Listener{

    /** @var ReverseTranslator */
    private $rt;
    
    public function onEnable() {
        $plugin = $this->getServer()->getPluginManager()->getPlugin("ReverseTranslation");
        $this->rt = $plugin->getReverseTranslator();
    }

    public function onBreakBlock(BlockBreakEvent $ev) {
        $block = $ev->getBlock();
        $player = $ev->getPlayer();
        $player->sendMessage(new TranslationContainer("Translated: " . $this->rt->getByBlock($block)));
        // If you want to display the message along with the block name, combine the messages in TranslationContainer
    }

}
```

or you can use json file directly!
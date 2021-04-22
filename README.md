# ReverseTranslation

> S: Server, C: Client

S: {Item, Block}Name ==[ReverseTranslation]==> NamespacedID ==[TranslationContainer]  

C: TextPacket ==[Client side i18n]==> Client locale {Item, Block}Name

## resources/{API}_v{MinecraftVersion}.json

auto generated.

## Usage

### as plugin

plugin.yml
```yaml
depends:
 - ReverseTranslation # fuyutsuki/ReverseTranslation
```

### as virion

poggit.yml
```yaml
# Poggit-CI Manifest. Open the CI at https://poggit.pmmp.io/ci/author/YourProject
branches:
  - master
projects:
  YourProject:
    path: ""
    icon: ""
    libs:
      - src: fuyutsuki/ReverseTranslation/libReverseTranslation
        version: 1.14.30
```

### API

src/example/ExamplePlugin/Main.php

```php
<?php

declare(strict_types=1);

namespace example\ExamplePlugin;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use jp\mcbe\ReverseTranslation\ReverseTranslator;

class Main extends PluginBase implements Listener {

    /** @var ReverseTranslator */
    private $rt;
    
    public function onEnable() {
        $this->rt = ReverseTranslator::getInstance();
    }

    public function onBreakBlock(BlockBreakEvent $ev) {
        $block = $ev->getBlock();
        $player = $ev->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        
        $player->sendTranslation("What you have: {$this->rt->fromItem($item)}");
        $player->sendTranslation("What you broke: {$this->rt->fromBlock($block)}");
    }

}
```

or you can use json file directly!
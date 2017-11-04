# SimplePositionToJson
__Enables PocketMine developers to take positions faster__

* Simple config
* 
* Version 1.0

## Example code

### Setup

1. Add virion to your plugin
2. Add API :
    use MineBuilderFR\SimplePositionToJson\Base as API;

### Code
   
    $api = new API("lolmddrletest", "G:/Serveur3/worlds" , Base::QUEST_ADDITION_FILE);
    $x = 0; $y = 0; $z = 0;
        $api
            ->AddJsonFilePosition(new Position($x,$y,$z))
            ->addPosition(new Position($x,$y,$z))
            ->addPosition(new Position($x,$y,$z))
            ->Generate();
            
### Result

    [
      {"x":0,"y":0,"z":0,"level":null},
      {"x":1,"y":1,"z":1,"level":null},
      {"x":2,"y":2,"z":2,"level":null}
    ]

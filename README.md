# SimplePositionToJson
__Enables PocketMine developers to take positions faster__

* Simple config
* Version 1.0

### Setup

1. Add virion to your plugin
2. Add API :

		use MineBuilderFR\SimplePositionToJson\Base as API;
    
## Example code

### Code
   
    $api = new API($filename, $directoryfilepath , $quest);
    $x = 0; $y = 0; $z = 0;
        $api
            ->AddJsonFilePosition(new Position($x,$y,$z))
            ->addPosition(new Position($x,$y,$z))
            ->addPosition(new Position($x,$y,$z))
            ->Generate();
            
### Result

    [
      {"x":0,"y":0,"z":0,"level":null},
      {"x":0,"y":0,"z":0,"level":null},
      {"x":0,"y":0,"z":0,"level":null}
    ]

### API

		API->addPosition(Position $position);
Add New Position In Json File

		API->setFileDirectoryGenerate(string $filedirectorygenerate);
Set New File Directory

		API->setFileAlreadyExistQuest(int $filealreadyexistsquest);
Set New Option File Delete

		API->Generate() : Void;
Generate Json File in File Directory (Finale instruction)

### Quest Constant

		const QUEST_REMOVE_FILE = 0;
  		const QUEST_ADDITION_FILE = 1;

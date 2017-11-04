<?php

namespace MineBuilderFR\SimplePositionToJson;

use MineBuilderFR\SimplePositionToJson\Json\Need;
use pocketmine\level\Position;

class Base
{

    const QUEST_REMOVE_FILE = 0;
    const QUEST_ADDITION_FILE = 1;

    /**
     * @var string
     */
    private $jsonname;
    /**
     * @var string
     */
    private $filedirectorygenerate;

    /**
     * @var int
     */
    private $filealreadyexistsquest;

    /**
     * Base constructor.
     * @param string $jsonname
     * @param string $filedirectorygenerate
     * @param int $filealreadyexistsquest
     */
    public function __construct(string $jsonname, string $filedirectorygenerate, int $filealreadyexistsquest = self::QUEST_REMOVE_FILE)
    {
        $this->jsonname = $jsonname;
        $this->filedirectorygenerate = $filedirectorygenerate;
        $this->filealreadyexistsquest = $filealreadyexistsquest;
    }

    /**
     * @param Position $position
     * @return Need
     */
    public function AddJsonFilePosition(Position $position)
    {
        return new Need(
            $this->jsonname,
            $position,
            $this->filedirectorygenerate,
            $this->filealreadyexistsquest
        );
    }

}
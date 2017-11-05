<?php

namespace MineBuilderFR\SimplePositionToJson\Json;

use MineBuilderFR\SimplePositionToJson\Base;
use MineBuilderFR\SimplePositionToJson\BaseINT;
use pocketmine\level\Position;

/**
 * Class Need
 * @package MineBuilderFR\SimplePositionToJson\Json
 *
 * Use Base->AddJsonFilePosition to use this Virion
 */
class Need implements BaseINT
{
    /**
     * @var array
     */
    private $allposition = [];
    /**
     * @var string
     */
    private
        $jsonname,
        $filedirectorygenerate;
    /**
     * @var Position
     */
    private $position;
    /**
     * @var int
     */
    private $filealreadyexistsquest;

    /**
     * Need constructor.
     * @param string $jsonname
     * @param Position $position
     * @param string $filedirectorygenerate
     * @param int $filealreadyexistsquest
     */
    public function __construct(string $jsonname, Position $position, string $filedirectorygenerate, int $filealreadyexistsquest)
    {
        $this->jsonname = $jsonname;
        $this->position = $position;
        $this->filedirectorygenerate = $filedirectorygenerate;
        $this->filealreadyexistsquest = $filealreadyexistsquest;
        //Base Position
        $this->addPosition($position);
    }

    /**
     * Add New Position In Json File
     * @param Position $position
     * @return Need
     */
    public function addPosition(Position $position): self
    {
        array_push(
            $this->allposition,
            array(
                "x" => $position->getX(),
                "y" => $position->getY(),
                "z" => $position->getZ(),
                "level" => $position->getLevel()->getFolderName()
            )
        );
        return $this;
    }

    /**
     * Set New File Directory
     * @param string $filedirectorygenerate
     */
    public function setFileDirectoryGenerate(string $filedirectorygenerate): self
    {
        $this->filedirectorygenerate = $filedirectorygenerate;
        return $this;
    }

    /**
     * Set New Json File Name To Generate
     * @param string $jsonname
     * @return Need
     */
    public function setJsonName(string $jsonname): self
    {
        $this->jsonname = $jsonname;
        return $this;
    }

    /**
     * Set New Option File Delete
     * @param int $filealreadyexistsquest
     * @return Need
     */
    public function setFileAlreadyExistQuest(int $filealreadyexistsquest): self
    {
        $this->filealreadyexistsquest = $filealreadyexistsquest;
        return $this;
    }

    /**
     * Generate Json File in File Directory
     * Finale instruction execute to generate JsonFile
     * @return void
     * @throws \Exception
     */
    public function Generate(): Void
    {
        $jsonname = $this->jsonname;
        $jsonpos = $this->filedirectorygenerate . "/" . $jsonname . ".json";
        $addition = null;
        if($this->filealreadyexistsquest == Base::QUEST_ADDITION_FILE){
            if(file_exists($jsonpos)){
                $addition = file_get_contents($jsonpos);
            }
        }
        if(!is_null($addition)){
            $addition = json_decode($addition, true);
            if(!is_array($addition)){
                throw new \Exception(
                    "File is not a valid Json Array"
                );
                return;
            }
            foreach($this->allposition as $all){
                array_push($addition, $all);
            }
            $addition = json_encode($addition);
        }
        if(is_null($addition)){
            $n = json_encode($this->AllPosition());
        }else{
            $n = $addition;
        }
        if (file_put_contents(
                $jsonpos,
                $n
            ) == true) {
            echo "Json file successfully generated in : " . $jsonpos;
        } else {
            throw new \Exception("Error Json File not generated");
        }
    }

    /**
     * @return array
     */
    final public function AllPosition(): array
    {
        return $this->allposition;
    }

    /**
     * @return string
     */
    final public function getJsonName(): string
    {
        return $this->jsonname;
    }
}

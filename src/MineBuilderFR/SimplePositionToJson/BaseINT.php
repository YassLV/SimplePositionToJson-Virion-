<?php

namespace MineBuilderFR\SimplePositionToJson;


interface BaseINT
{

    /**
     * @return array
     */
    public function AllPosition() : array;

    /**
     * @return string
     */
    public function getJsonName() : string;

}

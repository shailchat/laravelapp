<?php

namespace App\Util;

class EmployeeUtitlity
{
    /**
     * Returns a unique employee id
     * @param $id
     * @return mixed|string
     */
    public static function generateEmployeeId($id){
        return ($id == "") ? "STPI001" : "STPI" . $id;
    }
}

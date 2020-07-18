<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RandomString extends Controller
{
    public function UniqueWithDatabase($table, $row){
        $this->$row = [
            $row => mt_rand(10000000000000000,99999999999999999)
        ];
        //Make unique rand number fron invoice
        $rules = [$row => 'unique:'.$table];

        $validate = Validator::make($this->$row, $rules)->passes();

        return $validate ? $this->$row[$row] : $this->UniqueWithDatabase($table, $row);
    }
}

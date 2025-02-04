<?php

namespace App\Enums;

enum ProductEnum: string
{
    case PRODUCT_01 = 'Leche';
    case PRODUCT_02 = 'Jamonada';

    public function amount():int 
    {
        return match($this){
            self::PRODUCT_01 => 10,
            self::PRODUCT_02 => 5,
        };
    }
    public function category():string
    {
        return match($this){
            self::PRODUCT_01 => 'lacteo',
            self::PRODUCT_02 => 'embutido',
        };
    }
    public function date():string
    {
        return match($this){
            self::PRODUCT_01 => '01/01/25',
            self::PRODUCT_02 => '02/02/25',
        };
    }
    public function price():float
    {
        return match($this){
            self::PRODUCT_01 => '4.50',
            self::PRODUCT_02 => '1.50',
        };
    }
}

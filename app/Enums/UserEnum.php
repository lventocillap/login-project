<?php

namespace App\Enums;

enum UserEnum: string
{
    case USER_01 = 'luis@gmail.com';
    case USER_02 = 'rezno@gmail.com';
    case USER_03 = 'edwin@gmail.com';
    case USER_04 = 'salvador@gmail.com';
    public function passwords(): string
    {
        return match ($this) {
            self::USER_01 => 'luis123',
            self::USER_02 => 'renzo123',
            self::USER_03 => 'edwin123',
            self::USER_04 => 'salvador123',
        };
    }
    public function names(): string
    {
        return match ($this) {
            self::USER_01 => 'name',
            self::USER_02 => 'renzo',
            self::USER_03 => 'edwin',
            self::USER_04 => 'salvador',
        };
    }
}

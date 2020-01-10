<?php
namespace App\Helpers;

class ZHPHelper
{
    const CHORAGWIE = [
        self::NONE              => 'Brak',
        self::BIALOSTOCKA       => 'Białostocka',
        self::DOLOSLASKA        => 'Dolnośląska',
        self::GDANSKA           => 'Gdańska',
        self::KIELECKA          => 'Kielecka',
        self::KRAKOWSKA         => 'Krakowska',
        self::KUJPOM            => 'Kujawsko-Pomorksa',
        self::LUBELSKA          => 'Lubelska',
        self::LODZKA            => 'Łódzka',
        self::MAZOWIECKA        => 'Mazowiecka',
        self::OPOLSKA           => 'Opolska',
        self::PODKARPACKA       => 'Podkarpacka',
        self::STOLECZNA         => 'Stołeczna',
        self::SLASKA            => 'Śląska',
        self::WARMINSKOMAZURSKA => 'Warmińsko-Mazurska',
        self::WIELKOPOLSKA      => 'Wielkopolska',
        self::ZACHODNIOPOMORSKA => 'Zachodniopomorska',
        self::ZIEMILUBUSKIEJ    => 'Białostocka',
    ];

    const NONE = 0;
    const BIALOSTOCKA = 1;
    const DOLOSLASKA = 2;
    const GDANSKA = 3;
    const KIELECKA = 4;
    const KRAKOWSKA = 5;
    const KUJPOM = 6;
    const LUBELSKA = 7;
    const LODZKA = 8;
    const MAZOWIECKA = 9;
    const OPOLSKA = 10;
    const PODKARPACKA = 11;
    const STOLECZNA = 12;
    const SLASKA = 13;
    const WARMINSKOMAZURSKA = 14;
    const WIELKOPOLSKA = 15;
    const ZACHODNIOPOMORSKA = 16;
    const ZIEMILUBUSKIEJ = 17;

    const STOPNIE = [
        self::PWD,
        self::PHM,
        self::HM,
    ];

    const PWD = 1;
    const PHM = 2;
    const HM = 3;
}

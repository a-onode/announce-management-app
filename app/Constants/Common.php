<?php

namespace App\Constants;

class Common
{
    const ANNOUNCE_ALL = '0';
    const ANNOUNCE_GENERAL = '1';
    const ANNOUNCE_TECH = '2';
    const ANNOUNCE_ORERATION = '3';
    const ANNOUNCE_OFFICE = '4';

    const ANNOUNCE_LIST = [
        'all' => self::ANNOUNCE_ALL,
        'general' => self::ANNOUNCE_GENERAL,
        'tech' => self::ANNOUNCE_TECH,
        'operation' => self::ANNOUNCE_ORERATION,
        'office' => self::ANNOUNCE_OFFICE,
    ];
}

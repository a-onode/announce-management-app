<?php

namespace App\Constants;

class Common
{
    // Announce Type
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

    // User Role
    const USER_ALL = '0';
    const USER_AGT = '1';
    const USER_ALD = '2';
    const USER_LD = '3';
    const USER_SV = '4';
    const USER_MGR = '5';

    const USER_LIST = [
        'all' => self::USER_ALL,
        'agt' => self::USER_AGT,
        'ald' => self::USER_ALD,
        'ld' => self::USER_LD,
        'sv' => self::USER_SV,
        'mgr' => self::USER_MGR,
    ];
}

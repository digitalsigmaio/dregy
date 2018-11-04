<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/4/2018
 * Time: 4:19 PM
 */

namespace App\Contracts;


interface AdminLog
{
    const ADMIN_LOG_IN = 'adminloggedin';
    const MESSAGES = [
        self::ADMIN_LOG_IN => 'Admin: ? logged in.',
    ];

    public function loggedIn();
}
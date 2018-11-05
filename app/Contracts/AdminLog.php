<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/4/2018
 * Time: 4:19 PM
 */

namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;

interface AdminLog
{
    const ADMIN_LOG_IN = 'adminloggedin';
    const ADMIN_UPDATE = 'adminupdate';
    const ADMIN_DELETE = 'admindelete';

    const MESSAGES = [
        self::ADMIN_LOG_IN => 'Admin: ? logged in.',
        self::ADMIN_UPDATE => 'Admin: ? updated property of #property with ID of #id.',
        self::ADMIN_DELETE => 'Admin: ? deleted property of #property with ID of #id.'
    ];

    public function loggedIn();
    public function updatedProperty(Model $model);
    public function deletedProperty(Model $model);
}
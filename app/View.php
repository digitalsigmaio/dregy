<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class View extends Model
{

    protected $fillable = [
        'user_id',
        'user_agent',
        'user_ip'
    ];

    public function viewable()
    {
        return $this->morphTo();
    }

    public static function new($class, Request $request)
    {
        if($request->has('userId')) {
            $userId = $request->userId;
        } else {
            $userId = null;
        }

        $userAgent = $request->header('user-agent');
        $userIp = \Request::ip();

        try {

            $view = $class->views()->create([
                'user_id' => $userId,
                'user_agent' => $userAgent,
                'user_ip'   => $userIp
            ]);

            return response()->json([
                'message' => $view
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }
}

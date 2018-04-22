<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 4/22/2018
 * Time: 4:43 PM
 */
namespace App\Traits;

use \Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

trait CollectionPagination {
    public static function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RedisController extends Controller
{
    public function index()
    {
        $items = [];
        // time: 8.97s, Size: 43.85MB, Data: 120000
        // $items = Item::all();

        // time: 16.42s, Size: 43.85MB, Data: 120000
        // $items = Item::all()->toArray();

        // time: 9.67s, Size: 43.85MB, Data: 120000
        // $items = Item::cursor();

        // before redis: (time: 39.67s, Size: 43.85MB, Data: 120000)
        // after redis: (time: 12.56s, Size: 43.85MB, Data: 120000)
        // $items = [];
        // Item::chunk(1000, function ($models) use (&$items) {
        //     foreach ($models as $item) {
        //         $data = Cache::remember('item:' . $item->id, 60 * 60 * 24, function () use ($item) {
        //             return $item->toArray();
        //         });

        //         $items[] = $data;
        //     }
        // });

        return $items;
    }
}

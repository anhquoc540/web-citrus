<?php

namespace App\Http\Services\Base\Custom;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class QueryCustom
{
    public function orderByArray($items, $attr, $order)
    {
        $sortedItems = [];
        foreach ($items as $item) {
            $key = is_object($item) ? $item->{$attr} : $item[$attr];
            $newKey = iconv('UTF-8', 'ASCII//TRANSLIT', $key);

            $pattern = '/[\'\"\s]+/';
            $replacement = '';
            $newKey = preg_replace($pattern, $replacement, $newKey);

            $sortedItems[$newKey] = $item;
        }

        if ($order === 'desc') {
            krsort($sortedItems);
        } else {
            ksort($sortedItems);
        }

        return array_values($sortedItems);
    }
}

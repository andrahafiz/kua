<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function setUrlImage($url, $default = 'example-image.jpg')
    {
        if ($url == "no-image.jpg" or $url == null) {
            return asset('img/' . $default);
        } elseif (!Storage::exists($url)) {
            return asset('img/' . $default);
        } else {
            return asset('storage/photos/' . str_replace('public/photos/', '', $url));
        }
    }

    public static function setUrlDocument($url, $default = 'example-image.jpg')
    {
        if ($url != null) {
            return asset('storage/documents/' . str_replace('public/documents/', '', $url));
        }
    }

    public static function AdminOrUser($route = null)
    {
        if (auth()->user()->roles == 'ADMIN') {
            return 'admin.' . $route;
        } else {
            return 'karyawan.' . $route;
        }
    }

    public static function formatRupiah($price)
    {
        return number_format($price, 0, ',', '.');
    }
}

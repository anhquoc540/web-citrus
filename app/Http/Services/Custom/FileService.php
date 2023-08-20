<?php
namespace App\Http\Services\Custom;

use Illuminate\Http\Request;
use App\Http\Services\BaseService;
// use App\Models\MFile;
use Arr;
use Illuminate\Support\Facades\Storage;

class FileService extends BaseService
{

    public function __construct()
    {
        
    }

    public function UploadedFile($files)
    {
        $listUrl = [];

        foreach ($files as $key => $file) {
            $item = Storage::disk('public')->put('images/' . date('Y-m-d'), $file);
            $url = config('app.url') . 'storage/' . $item;

            $listUrl[] = $url;
        }

        return $listUrl;
    }

}

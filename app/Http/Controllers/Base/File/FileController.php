<?php

namespace App\Http\Controllers\Base\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Custom\FileService;
use AlException;

class FileController extends Controller
{
    //
    public function __construct(FileService $file)
    {
        $this->file =  $file;
    }

    public function uploadFile(Request $request)
    {
        try {
            $files = $request->file('file_upload');

            if (! empty($files)) {
                $result = $this->file->UploadedFile($files);
                return $this->sendSuccessData($result,trans('response.success.upload'));
            }else {
                return $this->sendErrorData(422, 'File upload not null');
            }
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}

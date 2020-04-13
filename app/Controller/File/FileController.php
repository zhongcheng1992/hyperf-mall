<?php

declare(strict_types=1);

namespace App\Controller\File;

use App\Constants\ResponseCode;
use App\Controller\BaseController;
use App\Handler\File\FileUploadHandler;
use App\Request\File\FileRequest;

class FileController extends BaseController
{
    public function uploadAvatar(FileRequest $request, FileUploadHandler $uploadHandler)
    {
        $file = $request->file('avatar');
        $path = $uploadHandler->uploadFile($file, 'avatar');
        if (!$path)
        {
            return $this->response->json(responseError(ResponseCode::ERROR, '上传失败'));
        }

        return $this->response->json(responseSuccess(ResponseCode::SUCCESS, '上传成功', [
            'path' => $path
        ]));
    }

}

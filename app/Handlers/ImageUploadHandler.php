<?php
namespace App\Handlers;

use Illuminate\Support\Facades\Storage;

class ImageUploadHandler
{


	// 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    /**
     * [save 上传文件]
     * @param  [type] $file   [文件信息]
     * @param  [type] $folder [指定目录名称]
     * @return [type]         [完整的文件访问路径]
     */
    public function save($file,$folder){

    	//检查是否允许上传类型
    	if(!in_array($file->extension(), $this->allowed_ext)){
    		return false;
    	}

    	//上传文件
    	$path = $file->store($folder);

    	//返回路径
    	return [
    		"path" => config("app.url") . "//" .  $path,
    	];

    }

    //删除图片
    public function delImg($path){

        //判断是否是本地上传
        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';

        $servername = $_SERVER["SERVER_NAME"];

        if(strpos($path, $servername)){
          
            $path = str_replace($http_type . $servername, public_path(), $path);

            if(@unlink($path)){
                return true;
            }

        }

        return false;

    }
}
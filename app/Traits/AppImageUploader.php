<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 1/18/2018
 * Time: 2:22 PM
 */

namespace App\Traits;


use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


trait AppImageUploader
{
    /*
     * Upload image and save it on server with unique name
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     * */
    public function appUploadImage($image)
    {


        $img = base64_decode($image->file);
        return response()->json($img);
        /*$array = explode(',', $img);
        $ext = str_replace('data:image/', '', $array[0]);
        $imgName = uuid('img_') . '.' . $ext;
        $decoded = base64_decode($array[1]);
        $ifp= fopen(public_path($this->imagePath) . '/' .$imgName, 'wb');
        fwrite($ifp, $decoded);
        fclose($ifp);



        $uri = '/' . $this->imagePath . '/' . $imgName;
        $this->img = $uri;*/


    }
}
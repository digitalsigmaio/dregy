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

        try {
            $img = base64_decode($image->file);
            $imgName = uuid('img_') . '.jpg';

            File::put(public_path($this->imagePath) . '/' . $imgName, $img);


            $uri = '/' . $this->imagePath . '/' . $imgName;
            $this->img = $uri;
        } catch (FileException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 1/18/2018
 * Time: 2:22 PM
 */

namespace App\Traits;



use Illuminate\Http\Request;

trait AppImageUploader
{
    /*
     * Upload image and save it on server with unique name
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     * */
    public function appUploadImage(Request $request)
    {
        $image = (object) $request->img;
        $file = $image->file;
        $array = explode(',', $file);
        $ext = str_replace(['data:image/', ';base64'], '', $array[0]);
        $imgName = str_random(10) . '_' . time() . '.' . $ext;
        $decoded = base64_decode($array[1]);
        $ifp= fopen(public_path($this->imagePath) . '/' .$imgName, 'wb');
        fwrite($ifp, $decoded);
        fclose($ifp);


        $uri = '/' . $this->imagePath . '/' . $imgName;
        $this->img = $uri;

    }
}
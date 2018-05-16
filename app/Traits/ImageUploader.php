<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 1/18/2018
 * Time: 2:22 PM
 */

namespace App\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Image;


trait ImageUploader
{
	private $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];


    /*
     * Upload image and save it on server with unique name
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     * */
    public function uploadImage(Request $request)
    {

        $img = $request->img;
        $filename = $img->hashName();
        $path = $img->move(public_path($this->imagePath), $filename);
        // Create new imagick object
        $optimizer = new \Imagick($path);

        // Optimize the image layers
        $optimizer->optimizeImageLayers();

        // Compression and quality
        $optimizer->setImageCompression(\Imagick::COMPRESSION_JPEG);
        $optimizer->setImageCompressionQuality(25);

        // Write the image back
        $optimizer->writeImages($path, true);

        $uri = '/' . $this->imagePath . '/' . $filename;
        $this->img = $uri;

    }
}
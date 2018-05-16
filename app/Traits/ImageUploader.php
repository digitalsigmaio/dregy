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
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;


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
        ImageOptimizer::optimize($path);

        $uri = '/' . $this->imagePath . '/' . $filename;
        $this->img = $uri;

    }
}
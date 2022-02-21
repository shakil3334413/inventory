<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function imageUpload($request, $name, $directory)
    {
        $doUpload = function ($image) use ($directory) {
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extention = $image->getClientOriginalExtension();
            $imageName = $name . '_' . uniqId() . '.' . $extention;
            $image->move($directory, $imageName);
            return $directory . '/' . $imageName;
        };

        if (!empty($name) && $request->hasFile($name)) {
            $file = $request->file($name);
            if (is_array($file) && count($file)) {
                $imagesPath = [];
                foreach ($file as $key => $image) {
                    $imagesPath[] = $doUpload($image);
                }
                return $imagesPath;
            } else {
                return $doUpload($file);
            }
        }

        return false;
    }


    public function secondimageupload($image = null, $folder = null)
    {
        $image_one = $image;
        if ($image_one) {
            $image_name = pathinfo($image_one->getClientOriginalName(), PATHINFO_FILENAME);
            $image_full_name = $image_name;
            $extention = $image_one->getClientOriginalExtension();
            $destination_path = 'uploads/' . $folder . '/';
            $imageName = $image_full_name . '_' . uniqId() . '.' . $extention;
            $image_url = $destination_path . $imageName;

            $success = $image->move($destination_path, $imageName);
            if ($success) {

                return $image_url;
            }
            return false;
        }

    }


}

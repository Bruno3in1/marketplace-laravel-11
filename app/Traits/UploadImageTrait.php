<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait uploadImageTrait
{
    public function uploadImage(Request $request, $inputName, $path)
    {
        if($request->hasFile($inputName))
        {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $day = date('d');
            $month = date('m');
            $year = date('y');
            $imageName = 'media_' . uniqid() . '-' . $day . '-' . $month . '-' . $year . '-.' . $ext;
            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }
}

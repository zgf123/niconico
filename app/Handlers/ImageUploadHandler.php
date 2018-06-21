<?php
namespace App\Handlers;
use Image;

class ImageUploadHandler
{
    protected $exts = ['jpg', 'gif', 'png', 'jpeg'];

    public function save($file, $folder, $file_prefix, $max_width = false){
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        if(!in_array( $extension, $this->exts )){
            return false;
        }

        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());
        $folder_path = public_path() . '/' . $folder_name;

        $file->move($folder_path, $filename);
        
        if($max_width && $extension!='gif'){
            $this->reduceSize($folder_path . '/' . $filename, $max_width);
        }

        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }

    public function reduceSize($file_path, $max_width){
        $image = Image::make($file_path);

        $image->resize($max_width, null, function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save();
    }
}
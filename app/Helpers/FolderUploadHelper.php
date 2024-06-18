<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FolderUploadHelper
{
    public static function uploadFile($image, $folder)
    {
        try {
            if ($image && $image->isValid()) {
                $imageName = md5($image->getClientOriginalName() . strtotime('now')) . "." . $image->extension();
                $path = $image->storeAs($folder, $imageName, 'public');
                // Se precisar do caminho completo (com URL), utilize o Storage::url:
                $fullPath = Storage::url($path);
    
                return $fullPath;
            }
    
            return null;
        } catch (\Throwable $th) {
            return null;
        }
        
    }
}

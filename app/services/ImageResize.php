<?php 

namespace App\Services;
use Storage;
use Image;



class ImageResize {


    // redimensionnement des images pour le carrousel

         public function PhotoStore($file){

           

            $image = $file->store('','public'); 
            $file->store('','photo'); 
            $newimg= Image::make(Storage::disk('photo')->path($image))->resize(1440);
            $newimg->save();
         
 
            return $image;
            
        }
     

     public function PhotoDelete($file){

        Storage::disk('public')->delete($file);
        Storage::disk('photo')->delete($file);

     }
    }

     ?>
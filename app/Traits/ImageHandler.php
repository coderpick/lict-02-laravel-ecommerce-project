<?php


namespace App\Traits;


use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageHandler {
    protected $imageName;

    public function uploadImage( $image, $slug, $location, $width, $height, $name = null, $oldImage = null ) {
        if ( isset( $image ) ) {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            if ( isset( $name ) ) {
                $this->imageName = $name;
            } else {
                $this->imageName = $slug . '-' . $currentDate .'-'.uniqid().'.'.$image->getClientOriginalExtension();
            }

//            check if location exists or not
//            if ( !file_exists( 'storage/' . $location ) ) {
//                mkdir( 'storage/' . $location, 0777, true );
//            }
            if ( !Storage::disk( 'public' )->exists($location) ) {
                Storage::disk( 'public' )->makeDirectory( $location );
            }
//            delete existing image if exist
            $this->deleteImage( $oldImage, $location );

            // create new image with transparent background color
            //            $background = Image::canvas($width,$height);

//          read image file and resize it to 200x200
            //          but keep aspect-ratio and do not size up,
            //          so smaller sizes don't stretch
            $makeImage = Image::make( $image )->resize( $width, $height, function ($constraint){
                 $constraint->aspectRatio();
            } );

//          insert resized image centered into background
            //            $background->insert($makeImage, 'center');

//          save or do whatever you like
            $makeImage->save( 'storage/' . $location . '/' . $this->imageName );

//            resize new image and save to storage
            //            Image::make($image)->resize($width,$height)->save('storage/'.$location.'/'.$this->imageName,50);
        } else {
            if ( isset( $oldImage ) ) {
                $this->imageName = $oldImage;
            } else {
                $this->imageName = "default.png";
            }

        }
    }

    public function deleteImage( $image, $location ) {
        if ( isset( $image ) ) {
            if ( file_exists( 'storage/' . $location . '/' . $image ) ) {
                unlink( 'storage/' . $location . '/' . $image );
            }
        }
    }
}

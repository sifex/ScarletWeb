<?php

namespace Scarlet\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class ClanController extends Controller
{
    public function getClanBackground(Request $request) {
        // Image::configure(array('driver' => 'imagick'));
        Image::configure(array('driver' => 'imagick'));

        $image = Image::make('../public/images/toRemove/bg.jpg');

        if($request->get('blur')) {
            $image->blur(30);
        }

        return response($image->encode('jpg'))->header('Content-Type', 'image/jpg');

    }

    public function getClanLogo() {

    }
}

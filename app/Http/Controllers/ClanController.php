<?php

namespace Scarlet\Http\Controllers;

use League\Flysystem\FileNotFoundException;
use Storage;
use Log;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class ClanController extends Controller
{

    public $bgFileName = 'bg.jpg';

    public function __construct() {
        Image::configure(array('driver' => 'imagick'));
    }

    public function getClanBackground($clanID) {
        $file = '/public/clans/' . $clanID . '/' . $this->bgFileName;

        try {
            $imageString = Storage::get($file);
        } catch(\Exception $exception) {
            $this->logFileNotFoundException($exception);
            return;
        }
        $image = Image::make($imageString)->fit(1600, 1000, function ($constraint) {
            $constraint->upsize();
        });

        return response($image->encode('jpeg', 75))->header('Content-Type', 'image/jpeg');
    }

    public function getClanLogo() {

    }

    /**
     * Log File not found exception
     * @param FileNotFoundException $exception
     */
    public function logFileNotFoundException( $exception) {
        Log::error($exception);
    }
}

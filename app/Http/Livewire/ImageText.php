<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Response;
use Image;
use Johntaa\Arabic\I18N_Arabic; 

class ImageText extends Component
{
    public $name;
    public $base64;

    public function updatingName()
    {
    //  \ArPHP\I18N\Arabic()
        $img = Image::make('img/eid-1.jpg');
        $Arabic = new \ArPHP\I18N\Arabic();
        $name = $Arabic->utf8Glyphs($this->name);
        $img->text($name, 304, 570, function($font) {
            $font->file('font/M-Unicode-Diala.ttf');
            $font->size(60);
            $font->color('#332819');
            $font->align('right');
        });
        $img->encode('jpg');
        $type = 'jpg';
        $this->base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);

    }
    public function updatedName()
    {
        $this->updatingName();
    }

    public function render()
    {
        return view('livewire.image-text');
    }
}

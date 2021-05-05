<?php

/*
 * No es apto para produccion, solo para practica
 * *************************************************
 * * (c) Migbert Yanez - migbertyanez@disroot.org  *
 * *************************************************
 * "La Verdad solo se puede encontrar en un lugar: El Codigo"
 */

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $open = false;
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    /* public function updated($propertyName)
     {
         $this->validateOnly($propertyName);
     }*/

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['open', 'title', 'content']);

        $this->emitTo('show-posts', 'render'); //$this->emit('render');
        $this->emit('alert', 'El Post se creo satisfactoriamente.');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}

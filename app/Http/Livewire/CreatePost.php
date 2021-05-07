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
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    //usado para poder subir imagenes al servidor
    use WithFileUploads;

    public $open = false;
    public $title;
    public $content;
    public $image;
    public $identificador;
    // declaracion de validacion de variables
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048',
    ];

    public function mount()
    {
        $this->identificador = rand();
    }

    /* public function updated($propertyName)
     {
         $this->validateOnly($propertyName);
     }*/

    public function save()
    {
        $this->validate();

        $image = $this->image->store('posts');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,
        ]);

        $this->reset(['open', 'title', 'content', 'image']);

        $this->identificador = rand();

        $this->emitTo('show-posts', 'render'); //$this->emit('render');

        $this->emit('alert', 'El Post se creo satisfactoriamente.');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}

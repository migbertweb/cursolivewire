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
    // validacion de variables
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048',
    ];

    // inicializacion de variables utilizando un hooks de Livewire (mount)
    public function mount()
    {
        $this->identificador = rand();
    }

    /**
     * guarda los datos de Post en la BD.
     *
     * @method    save
     */
    public function save()
    {
        // valida los datos
        $this->validate();
        //sube la imagen al servidor y obtiene la url
        $image = $this->image->store('posts');
        // crea el post
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,
        ]);
        // resetea las variables
        $this->reset(['open', 'title', 'content', 'image']);
        // agrega un nuevo valor a identificador para resetear el input FILE
        $this->identificador = rand();
        // emite al showpost para que renderice el metodo Render
        $this->emitTo('show-posts', 'render');
        // emite para que se muestre una alerta en show post
        $this->emit('alert', 'El Post se creo satisfactoriamente.');
    }

    /**
     * renderiza la vista Create Post.
     *
     * @method    render
     *
     * @return una vista
     */
    public function render()
    {
        return view('livewire.create-post');
    }
}

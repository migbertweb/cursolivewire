<?php

/*
 * Este archivo es parte de mi entrenamiento con Laravel
 * y Jetstream
 * No es apto para produccion
 * (c) Migbert Yanez - migbertyanez@disroot.org
 * "Estudiar de salir a la luz"
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

    /**
     * Renderiza la vista del componente.
     *
     * @method    render
     *
     * @author Migbert Yanez Caña <migbertyanez@disroot.org>
     *
     * @return [type] [description]
     */
    public function render()
    {
        return view('livewire.create-post');
    }
}

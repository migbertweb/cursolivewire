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
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public $open_edit = false; // se encarga de abrir el Modal
    public $post;
    public $image;
    public $identificador;
    // Declaracion de Reglas de Validacion
    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
    ];

    // tiene el mismo resultado['render' => 'render']
    protected $listeners = ['render'];

    /**
     * Funcion para inicializar propiedades.
     *
     * @method    mount
     */
    public function mount()
    {
        // inicializar y asignar numero aleatorio
        $this->identificador = rand();
        // Instanciamos la propiedad post del Modelo Post
        $this->post = new Post();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('content', 'like', '%' . $this->search . '%')
            ->orderby($this->sort, $this->direction)
            ->paginate(10)
        ;

        return view('livewire.show-posts', compact('posts'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ('desc' == $this->direction) {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Post $post)
    {
        $this->post = $post;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->post->image]);

            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        $this->reset(['open_edit', 'image']);

        $this->identificador = rand();

        $this->emit('alert', 'El Post se edito satisfactoriamente.');
    }
}

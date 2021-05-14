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
    /* facade para subir imagenes y
    utilizar la paginacion reactiva de Livewire */
    use WithFileUploads;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $open_edit = false; // se encarga de abrir el Modal
    public $post;
    public $image;
    public $identificador;
    public $cant = '10';
    public $readyToload = false; //para la carga diferida

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

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

    /*utilizamos un hooks de livewire para
     actualizar search y resetear la paginacion*/
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Renderiza la pagina que muestra la tabla con los datos de Posts.
     *
     * @method    render
     */
    public function render()
    {
        if ($this->readyToload) {
            // obtenemos los datos de los post en la base de datos y paginamos solo 10
            $posts = Post::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('content', 'like', '%' . $this->search . '%')
                ->orderby($this->sort, $this->direction)
                ->paginate($this->cant)
            ;
        } else {
            $posts = [];
        }

        // retornamos la vista y pasamos los datos posts
        return view('livewire.show-posts', compact('posts'));
    }

    public function loadPosts()
    {
        $this->readyToload = true;
    }

    // metodo para ordenar los resultados en la tabla
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

    /**
     * metodo para editar post, muestra el modal con los datos.
     *
     * @method    edit
     *
     * @param Post $post obtenido de la vista de ShowPosts
     *
     * @return [type] [description]
     */
    public function edit(Post $post)
    {
        $this->post = $post;
        $this->open_edit = true;
    }

    /**
     * funcion que guarda los datos en la BD.
     *
     * @method    update
     */
    public function update()
    {
        // valida los datos obtenidos
        $this->validate();
        // si hay una imagen nueva
        if ($this->image) {
            // borra la anterior del servidor en /post
            Storage::delete([$this->post->image]);
            // y sube la nueva obteniendo su url
            $this->post->image = $this->image->store('posts');
        }
        // salva los datos en BD
        $this->post->save();
        // resetea los parametros:
        $this->reset(['open_edit', 'image']);

        $this->identificador = rand();
        // emite una alert con el resultado
        $this->emit('alert', 'El Post se edito satisfactoriamente.');
    }
}

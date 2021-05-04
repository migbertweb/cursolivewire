<?php

/*
 * migbertyanez@disroot.org
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
        'title' => 'required|max:100',
         'content' => 'required|min:100'
     ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['open', 'title', 'content']);

        $this->emitTo('show-posts', 'render');//$this->emit('render');
        $this->emit('alert', 'Postcontent1');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}

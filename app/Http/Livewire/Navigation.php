<?php

/*
 * No es apto para produccion, solo para practica
 * *************************************************
 * * (c) Migbert Yanez - migbertyanez@disroot.org  *
 * *************************************************
 * "La Verdad solo se puede encontrar en un lugar: El Codigo"
 */

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    /**
     * Renderiza la NavBar en applayout.
     *
     *  @method    render
     *
     * @return view
     */
    public function render()
    {
        return view('livewire.navigation');
    }
}

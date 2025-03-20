<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Flash_infos;

class Flashinfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $flashinfos = Flash_infos::allFashInfo();
        //dd( $flashinfos);
        return view('components.flashinfo', compact('flashinfos'));
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Piedpage;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $contenue = Piedpage::allPiedpage();
        $liensInstitutionelles = $contenue[1] ?? [];
        $lienUtiles = $contenue[2] ?? [];
        $documents = $contenue[3] ?? [];
        return view('components.footer', compact('liensInstitutionelles', 'lienUtiles', 'documents'));
    }
}


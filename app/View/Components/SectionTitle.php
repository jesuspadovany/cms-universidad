<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionTitle extends Component
{
    public $title;
    public $icon;

    public function __construct($title, $icon = '')
    {
        $this->title = $title;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.section-title');
    }
}

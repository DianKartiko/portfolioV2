<?php

namespace App\View\Components\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavBar extends Component
{
    /**
     * Data navigasi untuk menu utama menggunakan named routes.
     */
    public array $navigation = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->navigation = [
            ['label' => 'Home', 'route' => 'home'],
            ['label' => 'Resume', 'route' => 'resume'],
            ['label' => 'Gallery', 'route' => 'gallery'],
            ['label' => 'Blogs', 'route' => 'blogs'],
            ['label' => 'Get in touch', 'route' => 'contact'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header.nav-bar');
    }
}

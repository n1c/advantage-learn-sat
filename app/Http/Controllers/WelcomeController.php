<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class WelcomeController
{
    public function __invoke()
    {
        return Inertia::render('Welcome');
    }
}

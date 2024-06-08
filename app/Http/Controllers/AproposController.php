<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AproposController extends Controller
{
    public function index(): View
    {
        return view("pages.apropos");
    }
}

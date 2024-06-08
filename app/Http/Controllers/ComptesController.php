<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ComptesController extends Controller
{
    public function index(): View
    {
        return view("pages.comptes");
    }
}

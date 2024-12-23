<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Menu;
use App\Models\Visi;
use App\Models\Sambutan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $visis = Visi::where('category', 'Visi')->get();
        $misis = Visi::where('category', 'Misi')->get();
        $sambutan = Sambutan::all()->first();
        $hero = Hero::all()->first();
        $menus = Menu::all();
        return view('welcome', ['misis' => $misis, 'visis' => $visis, 'sambutan' => $sambutan, 'hero' => $hero, 'menus' => $menus]);
    }
}

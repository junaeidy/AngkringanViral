<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Menu;
use App\Models\Visi;
use App\Models\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $visis = Visi::where('category', 'Visi')->get();
        $Misis = Visi::where('category', 'Misi')->get();
        $sambutan = Sambutan::all()->first();
        $heroes = Hero::all()->first();
        $menus = Menu::all();
        return view('admin.dashboard', ['visis' => $visis, 'Misis' => $Misis, 'sambutan' => $sambutan, 'heroes' => $heroes, 'menus' => $menus]);
    }

    public function createVisi()
    {
        return view('admin.visi.create');
    }

    public function processVisi(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'category' => 'required|string|max:255',
        ]);

        $visi = new Visi();
        $visi->title = $request->title;
        $visi->content = $request->content;
        $visi->category = $request->category;
        $visi->save();

        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('dashboard');
    }

    public function showEditVisi($id)
    {
        $visi = Visi::findOrFail($id);
        return view('admin.visi.edit', ['visi' => $visi]);
    }
    public function editVisi(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'category' => 'required|string|max:255',
        ]);

        $visi = Visi::findOrFail($request->id);
        $visi->title = $request->title;
        $visi->content = $request->content;
        $visi->category = $request->category;
        $visi->save();

        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('dashboard');
    }

    public function deleteVisi($id)
    {
        $visi = Visi::findOrFail($id);
        $visi->delete();
        Alert::success('Berhasil Menghapus', 'Berhasil menghapus data.');
        return redirect()->route('dashboard');
    }

    public function processMisi(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'category' => 'required|string|max:255',
        ]);

        $misi = new Visi();
        $misi->title = $request->title;
        $misi->content = $request->content;
        $misi->category = $request->category;
        $misi->save();

        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('dashboard');
    }

    public function showEditMisi($id)
    {
        $misi = Visi::findOrFail($id);
        return view('admin.misi.edit', ['misi' => $misi]);
    }
    public function editMisi(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'category' => 'required|string|max:255',
        ]);

        $misi = Visi::findOrFail($request->id);
        $misi->title = $request->title;
        $misi->content = $request->content;
        $misi->category = $request->category;
        $misi->save();

        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('dashboard');
    }

    public function deleteMisi($id)
    {
        $misi = Visi::findOrFail($id);
        $misi->delete();
        Alert::success('Berhasil Menghapus', 'Berhasil menghapus data.');
        return redirect()->route('dashboard');
    }

    public function processSambutan(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:10000',
        ]);

        $sambutan = new Sambutan();
        $sambutan->message = $request->message;
        $sambutan->save();
        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('dashboard');
    }

    public function processEditSambutan(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:10000',
        ]);
        
        $sambutan = Sambutan::all()->first();
        $sambutan->update($validated);
        return back()->with('success', 'Berhasil mengubah kata sambutan');
    }

    public function heroCreate()
    {
        return view('admin.hero.create');
    }

    public function heroProcess(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            Hero::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
            ]);
        }

        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('dashboard');
    }
    

    public function heroUpdate(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hero = Hero::all()->first();
        $hero->title = $request->title;
        $hero->content = $request->content;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($hero->image && Storage::exists('images/menu' . $hero->image)) {
                Storage::delete('public/' . $hero->image);
            }
    
            // Store new image
            $path = $request->file('image')->store('uploads', 'public');
            $hero->image = $path;
        }
        $hero->update();
        Alert::success('Data Berhasil Diperbaharui', 'Data berhasil diperbaharui.');
        return redirect()->route('dashboard');
    }

    public function menuCreate()
    {
        return view('admin.menu.create');
    }

    public function menuProcess(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            Menu::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
            ]);
        }
        
        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('dashboard');
    }

    public function showEditMenu($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', ['menu' => $menu]);
    }
    public function editMenu(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menu::all()->first();
        $menu->title = $request->title;
        $menu->content = $request->content;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($menu->image && Storage::exists('uploads/' . $menu->image)) {
                Storage::delete('uploads/' . $menu->image);
            }
    
            // Store new image
            $path = $request->file('image')->store('uploads', 'public');
            $menu->image = $path;
        }
        $menu->update();
        Alert::success('Data Berhasil Diperbaharui', 'Data berhasil diperbaharui.');
        return redirect()->route('dashboard');
    }

    public function deleteMenu($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        Alert::success('Berhasil Menghapus', 'Berhasil menghapus data.');
        return redirect()->route('dashboard');
    }
}

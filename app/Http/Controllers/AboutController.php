<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    public function index()
    {
        $stories = Story::all()->first();
        $abouts = About::all();
        return view('about', ['stories' => $stories, 'abouts' => $abouts]);
    }

    public function adminIndex()
    {
        $stories = Story::all()->first();
        $abouts = About::all();
        return view('admin.about.index', ['stories' => $stories, 'abouts' => $abouts]);
    }

    public function createStory()
    {
        return view('admin.about.create-story');
    }

    public function processStory(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:10000',
        ]);

        $story = new Story();
        $story->title = $request->title;
        $story->message = $request->message;
        $story->save();

        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('admin.about');
    }

    public function processEditStory(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:10000',
        ]);

        $story = Story::all()->first();
        $story->title = $request->title;
        $story->message = $request->message;
        $story->update();
        return back()->with('success', 'Berhasil mengubah Cerita Singkat');
    }

    public function createAbout()
    {
        return view('admin.about.create');
    }


    public function showEditAbout($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', ['about' => $about]);
    }
    public function processAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:10000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            About::create([
                'title' => $request->title,
                'message' => $request->message,
                'image' => $imagePath,
            ]);
        }

        Alert::success('Data Berhasil Disimpan', 'Data berhasil disimpan.');
        return redirect()->route('admin.about');
    }

    public function processEditAbout(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:10000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about = About::all()->first();
        $about->title = $request->title;
        $about->message = $request->message;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($about->image && Storage::exists('uploads/' . $about->image)) {
                Storage::delete('uploads/' . $about->image);
            }
    
            // Store new image
            $path = $request->file('image')->store('uploads', 'public');
            $about->image = $path;
        }
        $about->update();
        Alert::success('Data Berhasil Diperbaharui', 'Data berhasil diperbaharui.');
        return redirect()->route('admin.about');
    }

    public function deleteAbout($id)
    {
        $about = About::findOrFail($id);
        $about->delete();
        Alert::success('Berhasil Menghapus', 'Berhasil menghapus data.');
        return redirect()->route('admin.about');
    }
}

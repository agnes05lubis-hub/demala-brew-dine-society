<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoryPhotoController extends Controller
{
    public function index()
    {
        $categories = Menu::select('group_name', 'group_image')
            ->distinct()
            ->orderBy('group_name')
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function update(Request $request, string $groupName)
            {
                $request->validate([
                    'photo' => 'required|image|max:2048',
                ]);

                $file = $request->file('photo');
                $filename = \Illuminate\Support\Str::slug($groupName) . '.' . $file->getClientOriginalExtension();

                $file->storeAs('images', $filename, 'public'); // masuk ke storage/app/public/images/

                Menu::where('group_name', $groupName)
                    ->update(['group_image' => $filename]);

                return back()->with('success', "Foto kategori '{$groupName}' berhasil diupdate.");
            }
}
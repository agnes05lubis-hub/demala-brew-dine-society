<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category'); // 'Food', 'Drink', atau kosong

        $query = Menu::query();

        if (in_array($category, ['Food', 'Drink'])) {
            $query->where('category', $category);
        }

        $menus  = $query->orderBy('sort_order', 'asc')->get();
        $groups = $menus->groupBy('group_name');

        return view('admin.menu.index', compact('menus', 'groups', 'category'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateMenu($request);

        // Kalau grupnya sudah ada, pakai foto & catatan grup yang sama
        $existing = Menu::where('category', $data['category'])
            ->where('group_name', $data['group_name'])
            ->first();

        $data['group_image'] = $existing?->group_image;
        $data['group_note']  = $existing?->group_note;
        $data['sort_order'] ??= (Menu::max('sort_order') ?? 0) + 1;

        $menu = Menu::create($data);

        $this->applyGroupPhoto($request, $menu);

        return redirect('/admin/menu')->with('success', 'Menu ditambahkan!');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $this->validateMenu($request);

        // Kalau dipindah ke grup lain yang sudah ada, ikut foto & catatan grup itu
        $existing = Menu::where('category', $data['category'])
            ->where('group_name', $data['group_name'])
            ->where('id', '!=', $menu->id)
            ->first();

        $data['group_image'] = $existing?->group_image ?? $menu->group_image;
        $data['group_note']  = $existing?->group_note  ?? $menu->group_note;

        $menu->update($data);

        $this->applyGroupPhoto($request, $menu);

        return redirect('/admin/menu')->with('success', 'Menu diupdate!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect('/admin/menu')->with('success', 'Menu dihapus!');
    }

    /**
     * Validasi form (dipakai store & update).
     */
    private function validateMenu(Request $request): array
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|integer|min:1000',
            'category'    => 'required|in:Food,Drink',
            'group_name'  => 'required|string|max:255',
            'sort_order'  => 'nullable|integer',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        unset($validated['photo']); // file ditangani terpisah

        // Checkbox yang tidak dicentang tidak dikirim browser
        $validated['is_available'] = $request->boolean('is_available');

        return $validated;
    }

    private function applyGroupPhoto(Request $request, Menu $menu): void
    {
        if (!$request->hasFile('photo')) {
            return;
        }

        $file     = $request->file('photo');
        $filename = Str::slug($menu->group_name) . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('images', $filename, 'public');

        Menu::where('category', $menu->category)
            ->where('group_name', $menu->group_name)
            ->update(['group_image' => $filename]);
    }
}
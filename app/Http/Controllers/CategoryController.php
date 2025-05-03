<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('category', compact('categories')); // View index-nya bernama category.blade.php
    }

    public function create(): View
    {
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3|max:255'
        ],[

            'name.required' => 'wajib di isi ',
            'name.min' => 'Minimal 2 huruf',
            'name.max' => 'Maksimal 255 huruf'
        ]);
        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('add', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Category $category): View
    {
        return view('edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3|max:255'
        ],[

            'name.required' => 'wajib di isi',
            'name.min' => 'Minimal 2 huruf',
            'name.max' => 'Maksimal 255 huruf'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('edit', 'Category berhasil diperbarui!');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->back()->with('success', 'Category berhasil dihapus!'); 
    }
}
//back itu untuk kembali ke halaman sebelumnya
//route itu untuk kembali ke halaman yang di inginkan/sudah ditentukan
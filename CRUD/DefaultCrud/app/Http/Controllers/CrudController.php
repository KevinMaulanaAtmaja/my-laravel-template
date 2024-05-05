<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cruds = Crud::latest()->paginate(3);
        return view("crud.index", compact("cruds"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("crud.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'number' => 'required|integer',
            'checkbox' => 'required|string',
            'radio' => 'required|in:yes,no',
            'select' => 'required|string',
            'date' => 'required|date',
            'range' => 'required|numeric',
            'file' => 'required|file|mimes:jpeg,jpg,png,jfif|max:2048',
            'color' => 'required|string',
            'hidden' => 'required|string',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
        } else {
            $filename = null;
        }

        // Crud::create($request->all());
        Crud::create(array_merge($request->all(), ['file' => $filename]));

        return redirect()->route('crud.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $crud = Crud::find($id);
        return view('crud.show', compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $crud = Crud::find($id);
        return view("crud.edit", compact("crud"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'text' => 'required|string',
            'number' => 'required|integer',
            'checkbox' => 'required|string',
            'radio' => 'required|in:yes,no',
            'select' => 'required|string',
            'date' => 'required|date',
            'range' => 'required|numeric',
            'file' => 'nullable|file|mimes:jpeg,jpg,png,jfif|max:2048',
            'color' => 'required|string',
            'hidden' => 'required|string',
        ]);

        $crud = Crud::find($id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::delete('public/images/'.$crud->file);
            $file->storeAs('public/images', $filename);
        } else {
            $filename = $crud->file;
        }
        $crud->update(array_merge($request->all(), ['file' => $filename]));

        return redirect()->route('crud.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crud = Crud::find($id);

        if ($crud->file) {
            Storage::delete('public/images/'.$crud->file);
        }
        $crud->delete();

        return redirect()->route('crud.index')->with('success', 'Data berhasil dihapus.');
    }
}

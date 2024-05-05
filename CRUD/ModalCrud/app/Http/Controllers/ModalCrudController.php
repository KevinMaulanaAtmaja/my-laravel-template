<?php

namespace App\Http\Controllers;

use App\Models\ModalCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModalCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modalCruds = ModalCrud::latest()->paginate(3);
        return view('ModalCrud.index', compact('modalCruds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ModalCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text_input' => 'required|string',
            'number_input' => 'required|integer',
            'file_input' => 'required|file|mimes:jpeg,jpg,png,pdf,jfif|max:2048',
            'dropdown_input' => 'required|string',
            'date_input' => 'required|date',
            'color_input' => 'required|string',
            'radio_input' => 'required|in:yes,no',
            'hidden_input' => 'nullable|string',
        ]);

        if ($request->hasFile('file_input')) {
            $file = $request->file('file_input');
            $fileName =  time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/', $fileName);
        } else {
            $fileName = null;
        }
        ModalCrud::create(array_merge($request->all(), ['file_input' => $fileName]));

        return redirect()->route('modalcrud.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $modalCrud  = ModalCrud::find($id);
        return view('ModalCrud.show', compact('modalCrud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $modalCrud  = ModalCrud::find($id);
        return view('ModalCrud.edit',compact( 'modalCrud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'text_input' => 'required|string',
            'number_input' => 'required|integer',
            'file_input' => 'nullable|file|mimes:jpeg,jpg,png,pdf,jfif|max:2048',
            'dropdown_input' => 'required|string',
            'date_input' => 'required|date',
            'color_input' => 'required|string',
            'radio_input' => 'required|in:yes,no',
            'hidden_input' => 'nullable|string',
        ]);

        $modalCrud  = ModalCrud::find($id);
        if ($request->hasFile('file_input')) {
            $file = $request->file('file_input');
            $fileName =  time() . '.' . $file->getClientOriginalExtension();
            Storage::delete('public/images/' . $modalCrud->file_input);
            $file->storeAs('public/images/', $fileName);
        } else {
            $fileName = $modalCrud->file_input;
        }
        $modalCrud->update(array_merge($request->all(), ['file_input' => $fileName]));

        return redirect()->route('modalcrud.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $modalCrud = ModalCrud::find($id);
        if ($modalCrud->file_input) {
            Storage::delete('public/images/' . $modalCrud->file_input);
        }
        $modalCrud->delete();
        return redirect()->route('modalcrud.index')->with('success', 'Data berhasil dihapus.');
    }
}

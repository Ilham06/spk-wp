<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlternativeRequest;
use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::orderBy('created_at', 'asc')->get();

        return view('pages.alternative.index', [
            'alternatives' => $alternatives
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.alternative.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlternativeRequest $request)
    {
        Alternative::create($request->all());
        return redirect()->route('alternative.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternative $alternative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternative $alternative)
    {
        return view('pages.alternative.edit', [
            'alternative' => $alternative
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternative $alternative)
    {
        $alternative->update($request->all());
        return redirect()->route('alternative.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternative $alternative)
    {
        $alternative->delete();
        return redirect()->route('alternative.index')->with('success', 'Data Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriteriaRequest;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterias = Criteria::orderBy('created_at', 'asc')->get();

        return view('pages.criteria.index', [
            'criterias' => $criterias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CriteriaRequest $request)
    {
        Criteria::create($request->all());
        return redirect()->route('criteria.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $criteria = Criteria::findOrFail($id);

        return view('pages.criteria.edit', [
            'criteria' => $criteria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CriteriaRequest $request, $id)
    {
        $criteria = Criteria::findOrFail($id);
        $criteria->update($request->all());
        return redirect()->route('criteria.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Criteria::destroy($id);
        return redirect()->route('criteria.index')->with('success', 'Data Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeCriteria;
use App\Models\Criteria;
use Illuminate\Http\Request;

class AlternativeCriteriaController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::with('criterias')->orderBy('created_at', 'asc')->get();
        $criterias = Criteria::all();

        return view('pages.calculate.index', [
            'criterias' => $criterias,
            'alternatives' => $alternatives
        ]);
    }

    public function edit($id)
    {
        $criterias = Criteria::all();
        $alternative = Alternative::findOrFail($id);

        return view('pages.calculate.edit', [
            'criterias' => $criterias,
            'alternative' => $alternative
        ]);
    }

    public function update(Request $request, $id)
    {

        foreach ($request->criteria as $key => $criteria) {
            if ($criteria) {
                AlternativeCriteria::updateOrCreate([
                    'alternative_id' => $id,
                    'criteria_id' => $key
                ], [
                    'value' => $criteria
                ]);
            }
        }
        return redirect()->route('calculate.index')->with('success', 'Data Berhasil Diubah');
    }

    public function process()
    {
        $criterias = Criteria::with('alternatives')->get();
        $alternatives = Alternative::with('criterias.criteria')->orderBy('created_at', 'asc')->get();
        $total = $criterias->sum('weight');

        $w = [];
        foreach ($criterias as $key => $criteria) {
            $value = $criteria->weight / $total;

            $value = ($criteria->attribute == 'benefit') ? $value * 1 : $value * (-1) ;
            array_push($w, round($value, 3));
        }

        $s = [];
        $complete_s = [];
        foreach ($alternatives as $key => $alternative) {

            $multiply = 1;
            foreach ($alternative->criterias as $key => $criteria) {
                $value = pow($criteria->value, $w[$key]);
                $s[$alternative->code][$criteria->id] = round($value, 4);
                $multiply *= $s[$alternative->code][$criteria->id];
            }

            $complete_s[$alternative->code] = round($multiply, 4);
        }

        $v = [];
        $s_total = array_sum($complete_s);

        foreach ($complete_s as $key => $s) {
            $v[$key] = round($s / $s_total, 4);
        }

        $rank = collect($v)->sortDesc();

        dd($rank);


    }
}

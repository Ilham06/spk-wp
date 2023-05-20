<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Models\Alternative;
use App\Models\AlternativeCriteria;
use App\Models\Criteria;
use Illuminate\Http\Request;

class AlternativeCriteriaController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::with('criterias')->orderBy('created_at', 'asc')->get();
        $criterias = Criteria::orderBy('code', 'asc')->get();

        return view('pages.calculate.index', [
            'criterias' => $criterias,
            'alternatives' => $alternatives
        ]);
    }

    public function edit($id)
    {
        $criterias = Criteria::orderBy('code', 'asc')->get();
        $alternative = Alternative::findOrFail($id);

        return view('pages.calculate.edit', [
            'criterias' => $criterias,
            'alternative' => $alternative
        ]);
    }

    public function update(CalculateRequest $request, $id)
    {
        foreach ($request->criteria as $key => $c) {
            AlternativeCriteria::updateOrCreate([
                'alternative_id' => $id,
                'criteria_id' => $key
            ], [
                'value' => $c
            ]);
        }
        return redirect()->route('calculate.index')->with('success', 'Data Berhasil Diubah');
    }

    public function clear()
    {
        AlternativeCriteria::truncate();
        return redirect()->route('calculate.index')->with('success', 'Data Dikosongkan');
    }

    public function process()
    {
        $criterias = Criteria::with('alternatives')->get();
        $alternatives = Alternative::with('criterias.criteria')->get();
        $total = $criterias->sum('weight');

        $w = [];
        foreach ($criterias as $key => $criteria) {
            $value = $criteria->weight / $total;
            $value = ($criteria->attribute == 'benefit') ? $value * 1 : $value * (-1) ;
            $w[$criteria->code] = round($value, 3);
        }

        $result_s = [];
        $complete_s = [];
        foreach ($alternatives as $key => $alternative) {

            $multiply = 1;
            foreach ($alternative->criterias as $key => $criteria) {
                $value = pow($criteria->value, $w[$criteria->criteria->code]);
                $result_s[$alternative->code][$criteria->id] = round($value, 4);
                $multiply *= $result_s[$alternative->code][$criteria->id];
            }

            $complete_s[$alternative->code] = round($multiply, 4);
        }

        $v = [];
        $s_total = array_sum($complete_s);

        foreach ($complete_s as $key => $s) {
            $v[$key] = round($s / $s_total, 4);
        }

        $rank = collect($v)->sortDesc();
        $highest['alternativ'] = Alternative::whereCode(array_key_first($rank->toArray()))->first();
        $highest['value'] = $rank->first();

        return view('pages.calculate.result', [
            'criterias' => $criterias,
            'alternatives' => $alternatives,
            'complete_w' => $w,
            'complete_s' => $complete_s,
            'complete_v' => $v,
            'result' => $rank,
            'highest' => $highest
        ]);
    }
}

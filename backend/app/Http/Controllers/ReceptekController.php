<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Receptek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceptekController extends Controller
{
    public function index()
    {
        return Receptek::all();
    }

    public function store(Request $request)
    {
        $receptek = new Receptek();
        $receptek->nev = $request->nev;
        $receptek->kat_id = $request->kat_id;
        $receptek->kep_eleresi_ut = $request->kep_eleresi_ut;
        $receptek->leiras = $request->leiras;
        $receptek->save();

        return $receptek;
    }

    public function show($id)
    {
        return Receptek::find($id);
    }

    public function update(Request $request, $id)
    {
        $receptek = Receptek::find($id);
        if ($receptek) {
            $receptek->nev = $request->nev;
            $receptek->kat_id = $request->kat_id;
            $receptek->kep_eleresi_ut = $request->kep_eleresi_ut;
            $receptek->leiras = $request->leiras;
            $receptek->save();
        }

        return $receptek;
    }

    public function destroy($id)
    {
        $receptek = Receptek::find($id);
        if ($receptek) {
            $receptek->delete();
        }
    }

    public function receptekLista()
    {
        $receptek = DB::table('recepteks')
            ->join('kategoriaks', 'recepteks.kat_id', '=', 'kategoriaks.id')
            ->select('recepteks.nev', 'kategoriaks.nev as kategoria_nev', 'recepteks.kep_eleresi_ut', 'recepteks.leiras')
            ->get();

        return response()->json($receptek);
    }
}

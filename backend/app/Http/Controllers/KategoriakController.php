<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategoriak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriakController extends Controller
{
    public function index()
    {
        return Kategoriak::all();
    }

    public function store(Request $request)
    {
        $kategoriak = new Kategoriak();
        $kategoriak->nev = $request->nev;
        $kategoriak->save();

        return $kategoriak;
    }

    public function show($id)
    {
        return Kategoriak::find($id);
    }

    public function update(Request $request, $id)
    {
        $kategoriak = Kategoriak::find($id);
        if ($kategoriak) {
            $kategoriak->nev = $request->nev;
            $kategoriak->save();
        }

        return $kategoriak;
    }

    public function kategoriakLista()
    {
        $kategoriak = DB::table('kategoriaks')
            ->select('kategoriaks.id','kategoriaks.nev')
            ->get();

        return response()->json($kategoriak);
    }
}

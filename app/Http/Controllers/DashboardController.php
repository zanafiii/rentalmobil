<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Merek;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Menyiapkan data untuk Bar Chart All Mobil
        $mereksName = [];
        foreach(Merek::all() as $merek){
            array_push($mereksName, $merek->name);
        }
        $nTypes = [];
        foreach(Type::all() as $type){
            $n = [];
            foreach(Merek::all() as $merek){
                array_push($n, Product::where('types_id', $type->id)->where('mereks_id', $merek->id)->count());
            }
            $nTypes[$type->name] = [
                'type' => $type->name,
                'data' => $n,
            ];
        }

        // Menyiapkan data untuk Bar Chart All Mobil
        $pMereks = [];
        foreach(Merek::all() as $merek){
            $n = Product::where('mereks_id', $merek->id)->count();
            $pMereks[$merek->name] = [
                'name' => $merek->name,
                'data' => $n
            ];

        }

        return view('dashboard', compact('mereksName', 'nTypes', 'pMereks'));
    }

}

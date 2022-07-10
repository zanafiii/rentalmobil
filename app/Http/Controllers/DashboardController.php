<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Merek;
use App\Models\Product;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // List Merek
        $mereksName = [];
        foreach(Merek::all() as $merek){
            array_push($mereksName, $merek->name);
        }

        // List Type
        $typesName = [];
        foreach(Type::all() as $type){
            array_push($typesName, $type->name);
        }

        // Menyiapkan data untuk Bar Chart All Mobil
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

        // Menyiapkan data untuk Pie Merek
        $pMereks = [];
        foreach(Merek::all() as $merek){
            $n = Product::where('mereks_id', $merek->id)->count();
            $pMereks[$merek->name] = [
                'name' => $merek->name,
                'data' => $n
            ];
        }

        // Menyiapkan data untuk Pie Tipe
        $pTypes = [];
        foreach(Type::all() as $type){
            $n = Product::where('types_id', $type->id)->count();
            $pTypes[$type->name] = [
                'name' => $type->name,
                'data' => $n
            ];
        }

        return view('dashboard', compact(
            'mereksName', 'typesName', 'nTypes', 'pMereks', 'pTypes'));
    }

}

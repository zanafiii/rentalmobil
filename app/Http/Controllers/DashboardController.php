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
        $products = Product::all();

        // Menyiapkan data untuk chart
        // $mereks = Merek::all();
        $mereks = [];
        foreach(Merek::all() as $merek){
            array_push($mereks, $merek->name);
        }

        // $types = Type::all();

        $types = [];
        foreach(Type::all() as $type){
            array_push($types, $type->name);
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

        // dd(json_encode($nTypes));



        return view('dashboard', compact('mereks', 'nTypes'));
    }

}

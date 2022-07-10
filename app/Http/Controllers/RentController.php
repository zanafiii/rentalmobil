<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use App\Models\Product;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Rent::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <a href="'. route('dashboard.rent.edit', $item->id) .'" class="px-2 py-1 m-2 text-white bg-gray-500 rounded-md">
                            Edit
                        </a>
                        <form class="inline-block" action="'. route('dashboard.rent.destroy', $item->id ) .'" method="POST">
                            <button class="px-2 py-1 m-2 text-white bg-red-500 rounded-md">
                                Hapus
                            </button>
                            '. method_field('delete') . csrf_field() .'
                        </form>
                    ';
                })
                ->editColumn('users_id', function($item){
                    return $item->user['name'];
                })
                ->editColumn('products_id', function($item){
                    return $item->product['name'];
                })
                ->editColumn('total_harga', function($item){
                    return number_format($item->total_harga);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.rent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('pages.dashboard.rent.create', compact('products','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentRequest $request)
    {
        $data = $request->all();
        $hargaMobil = Product::where('id', $request->products_id)->first()->price;
        $data['total_harga'] = $hargaMobil* $request->lama_sewa;

        Rent::create($data);

        return redirect() -> route('dashboard.rent.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        $products = Product::all();
        $users = User::all();
        return view('pages.dashboard.rent.edit', [
            'item' => $rent
        ], compact('products','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RentRequest $request, Rent $rent)
    {
        $data = $request->all();
        $hargaMobil = Product::where('id', $request->products_id)->first()->price;
        $data['total_harga'] = $hargaMobil* $request->lama_sewa;
        $data['users_id'] = $rent->users_id;

        $rent->update($data);

        return redirect() -> route('dashboard.rent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        $rent->delete();

        return redirect()->route('dashboard.rent.index');
    }
}

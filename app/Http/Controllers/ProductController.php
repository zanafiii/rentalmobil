<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Type;
use App\Models\Merek;
use Brick\Math\BigInteger;
use Ramsey\Uuid\Type\Integer;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
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
            $query = Product::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <a href="'. route('dashboard.product.gallery.index', $item->id) .'" class="px-2 py-1 m-2 text-black bg-yellow-500 rounded-md">
                            Gallery
                        </a>
                        <a href="'. route('dashboard.product.edit', $item->id) .'" class="px-2 py-1 m-2 text-white bg-gray-500 rounded-md">
                            Edit
                        </a>
                        <form class="inline-block" action="'. route('dashboard.product.destroy', $item->id ) .'" method="POST">
                            <button class="px-2 py-1 m-2 text-white bg-red-500 rounded-md">
                                Hapus
                            </button>
                            '. method_field('delete') . csrf_field() .'
                        </form>
                    ';
                })
                ->editColumn('price', function($item){
                    return number_format($item->price);
                })
                ->editColumn('mereks_id', function($item){
                    return $item->merek['name'];
                })
                ->editColumn('types_id', function($item){
                    return $item->type['name'];
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mereks = Merek::all();
        $types = Type::all();
        return view('pages.dashboard.product.create', compact('mereks','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect() -> route('dashboard.product.index');
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
    public function edit(Product $product)
    {
        $mereks = Merek::all();
        $types = Type::all();
        return view('pages.dashboard.product.edit', [
            'item' => $product
        ], compact('mereks','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,  Product $product)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $product->update($data);

        return redirect() -> route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}

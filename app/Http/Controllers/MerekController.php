<?php

namespace App\Http\Controllers;

use App\Http\Requests\MerekRequest;
use App\Models\Merek;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MerekController extends Controller
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
            $query = Merek::query();

                return DataTables::of($query)
                    ->addColumn('action', function($item){
                        return '
                            <a href="'. route('dashboard.merek.edit', $item->id) .'" class="px-2 py-1 m-2 text-white bg-gray-500 rounded-md">
                                Edit
                            </a>
                            <form class="inline-block" action="'. route('dashboard.merek.destroy', $item->id ) .'" method="POST">
                                <button class="px-2 py-1 m-2 text-white bg-red-500 rounded-md">
                                    Hapus
                                </button>
                                '. method_field('delete') . csrf_field() .'
                            </form>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->make();
        }

        return view('pages.dashboard.merek.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.merek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerekRequest $request)
    {
        $data = $request->all();
        Merek::create($data);

        return redirect()->route('dashboard.merek.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return $this->dataTable();
        }

        return view('backend.admin.index');
    }
    private function dataTable()
    {
        $query = User::query();
            return DataTables::of($query)
                       ->order(function ($admin)
                       {
                        $admin->orderBy('created_at' , 'desc');
                       })
                       ->addColumn('created_at' , function ($data)
                      {
                        return date('d-M-Y H:i:s' , strtotime($data->created_at));
                      })
                      ->addColumn('updated_at' , function ($data)
                      {
                        return Carbon::parse($data->updated_at)->format('d-M-Y H:i:s');
                      })
                      ->rawColumns(['action'])
                      ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users'
            ]);
             
            $data = $request->all();
            $check = User::insert($data);
            $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
            if($check){ 
            $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
            }
            return Response()->json($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}

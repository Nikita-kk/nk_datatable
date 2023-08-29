<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables;
use Yajra\DataTables\DataTables;

class TableController extends Controller
{
    public function table(){
        return view('table');
    }

    public function gettable(Request $request)
    {
        if ($request->ajax()) {
            $data = Table::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}

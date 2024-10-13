<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
   */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');

            return DataTables::of($data)
            ->addColumn('actions',function ($row) {
                $statusText = ($row->status == 1) ? 'Active' : 'InActive';
                $badgeClass = ($row->status == 1) ? 'success' : 'danger';
                return '<td>
                       <span class="badge bg-'.$badgeClass.'">'.$statusText.'</span>
                </td>';
            })

                // ->addColumn('actions', function ($data){
                //     return view('admin.users.action_modal',compact('data'));

                // })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

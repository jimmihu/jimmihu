<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Auth\User\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Validator;
use Input;
use Illuminate\Support\Facades\Auth;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Outlet::paginate(10);
        return view('backend.auth.outlet.index',["outlets"=>$outlet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.auth.outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nmoutlet' => 'required',
            'alamat' => 'required',
            'aktif' => 'required'
            
        ]);
        Outlet::create([
            'nmoutlet' => $request->nmoutlet,
            'alamat' => $request->alamat,
            'aktif' => $request->aktif
        ]);
        return redirect()->intended(route('admin.outlet.index'));
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
        $outlet = Outlet::where('kdoutlet', $id)->first();
        return view('backend.auth.outlet.edit',["outlet"=>$outlet]);
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
        $validator = Validator::make($request->all(), [
            'nmoutlet' => 'required',
            'alamat' => 'required',
            'aktif' => 'required'
            
        ]);
        Outlet::where('kdoutlet', $id)->update([
            'nmoutlet' => $request->nmoutlet,
            'alamat' => $request->alamat,
            'aktif' => $request->aktif
        ]);
        return redirect()->intended(route('admin.outlet.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet = Outlet::where('kdoutlet', $id)->first();
        $outlet->delete();
        return redirect()->intended(route('admin.outlet.index'));
    }
}

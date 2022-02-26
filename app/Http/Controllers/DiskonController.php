<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Auth\User\User;
use App\Models\Outlet;
use App\Models\Diskon_H;
use App\Models\Diskon_D;
use Illuminate\Http\Request;
use Validator;
use Input;
use Illuminate\Support\Facades\Auth;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = Diskon_H::paginate(10);
        $outlet = Outlet::paginate(10);
        return view('backend.auth.diskon.index',["diskons"=>$diskon,"outlets"=>$outlet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = Outlet::paginate(10);
        return view('backend.auth.diskon.create',["outlets"=>$outlet]);
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
            'kdoutlet' => 'required',
            'awal' => 'required',
            'akhir' => 'required'
            
        ]);
        $diskon = Diskon_H::create([
            'awal' => $request->awal,
            'akhir' => $request->akhir
        ]);
        $outlet = Outlet::where('kdoutlet',$request->kdoutlet)->first();
        $diskon->outlet()->associate($outlet);
        $diskon->save();
        return redirect()->intended(route('admin.diskon.index'));
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
        $diskon = Diskon_H::where('nosurat', $id)->first();
        $diskon->delete();
        return redirect()->intended(route('admin.diskon.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Auth\User\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Validator;
use Input;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::paginate(10);
        return view('backend.auth.produk.index',["produks"=>$produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.auth.produk.create');
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
            'nmproduk' => 'required',
            'hna' => 'required'
            
        ]);
        Produk::create([
            'nmproduk' => $request->nmproduk,
            'hna' => $request->hna
        ]);
        return redirect()->intended(route('admin.produk.index'));
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
        $produk = Produk::where('kdproduk', $id)->first();
        return view('backend.auth.produk.edit',["produk"=>$produk]);
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
            'nmproduk' => 'required',
            'hna' => 'required'
            
        ]);
        Produk::where('kdproduk', $id)->update([
            'nmproduk' => $request->nmproduk,
            'hna' => $request->hna
        ]);
        return redirect()->intended(route('admin.produk.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::where('kdproduk', $id)->first();
        $produk->delete();
        return redirect()->intended(route('admin.produk.index'));
    }
}

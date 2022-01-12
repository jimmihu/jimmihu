<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auth\User\User;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use Validator;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::paginate(10);
        $company = Company::paginate();
        return view('backend.auth.employee.index',["employees"=>$employee,"companies"=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //cant use $id 
    }

    public function creates($id)
    {
        $company = Company::where('c_id', $id)->first();
        return view('backend.auth.employee.create',["company"=>$company]);
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
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'company' => 'required|max:255'
        ]);
        
        $employee = Employee::create([
            'e_first_name' => $request->f_name,
            'e_last_name' => $request->l_name,
            'e_email' => $request->email,
            'e_phone' => $request->phone
        ]);
        $company = Company::where('c_id',$request->company)->first();
        $employee->company()->associate($company);
        $employee->save();
        return redirect()->intended(route('admin.company.show',[$company->c_id]));
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
        $employee = Employee::where('e_id', $id)->first();
        return view('backend.auth.employee.edit',["employee"=>$employee]);
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
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);
        
        $employee = Employee::where('e_id', $id)->update([
            'e_first_name' => $request->f_name,
            'e_last_name' => $request->l_name,
            'e_email' => $request->email,
            'e_phone' => $request->phone
        ]);
        
        $employee = Employee::where('e_id', $id)->first();
        $company = Company::where('c_id',$employee->c_id)->first();
        return redirect()->intended(route('admin.company.show',[$company->c_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('e_id', $id)->first();
        $company = Company::where('c_id',$employee->c_id)->first();
        $employee->delete();
        return redirect()->intended(route('admin.company.show',[$company->c_id]));
    }
}

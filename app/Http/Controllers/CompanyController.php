<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Auth\User\User;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use Validator;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(10);
        return view('backend.auth.company.index',["companies"=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.auth.company.create');
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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'logo' => 'required|dimensions:min_width:100,min_height:100',
            'website' => 'required|max:255'
        ]);
        $file = $request->file('logo');
        $file_name = "$request->email".".jpg";
        $upload_folder = 'logo';

        if($file!=NULL){
            $file->move($upload_folder,$file_name);
        }
        $company = Company::create([
            'c_name' => $request->name,
            'c_email' => $request->email,
            'c_logo' => $request->email,
            'c_website' => $request->website
        ]);

        $to_name = $request->name;
        $to_email = $request->email;
        $data = array('name'=>"$request->name", 'body' => "Congratulations, you successfully created your Company at Jimmi Hu!");
        Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Welcome to Jimmi Hu');
        $message->from('project.k1999@gmail.com',"Test Mail");
        });
        
        return redirect()->intended(route('admin.company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where('c_id', $id)->first();
        $employee = Employee::where('c_id',$id)->paginate(10);
        return view('backend.auth.company.show',["company"=>$company,"employees"=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('c_id', $id)->first();
        return view('backend.auth.company.edit',["company"=>$company]);
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
        $before = Company::where('c_id', $id)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'logo' => 'dimensions:min_width:100,min_height:100',
            'website' => 'required|max:255'
        ]);

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $file_name = "$request->email".".jpg";
            $upload_folder = 'logo';
            if($file!=NULL){
                $file->move($upload_folder,$file_name);
            }
            $before->update([
                'c_name' => $request->name,
                'c_email' => $request->email,
                'c_logo' => $request->email,
                'c_website' => $request->website
            ]);
        }else{
            $before->update([
                'c_name' => $request->name,
                'c_email' => $request->email,
                'c_website' => $request->website
            ]);
        }

        
        return redirect()->intended(route('admin.company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::where('c_id', $id)->delete();
        return redirect()->intended(route('admin.company.index'));
    }
}

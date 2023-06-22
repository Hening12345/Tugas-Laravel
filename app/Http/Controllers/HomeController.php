<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::orderBy('id','desc')->paginate(5);
        return view('dashboard', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        Company::create($request->post());

        return redirect()->route('home')->with('success','Created successfully.');
    }

    public function show(Company $company)
    {
        return view('dashboard',compact('company'));
    }

    public function edit(Company $company)
    {
        return view('pages.edit',compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $company->fill($request->post())->save();

        return redirect()->route('home')->with('success','Updated successfully');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('home')->with('success','Deleted successfully');
    }
}

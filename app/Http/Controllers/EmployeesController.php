<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeesStoreRequest;
use App\Employees;
use App\Companies;
use Datatables;

class EmployeesController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      return view("employees.index");
   }

   public function data(Request $request)
   {
      return datatables()->of(Employees::with('company')->get())->toJson();
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      $companies = Companies::pluck("name", "id");
      return view("employees.create", compact("companies"));
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(EmployeesStoreRequest $request)
   {
      Employees::create($request->validated());
      return redirect(route('employees.index'));
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
      $data = Employees::findOrFail($id);
      $companies = Companies::pluck("name", "id");
      return view("employees.edit", compact("data", "companies"));
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(EmployeesStoreRequest $request, $id)
   {
      $data = $request->validated();
      $target = Employees::findOrFail($id);

      $target->update($data);

      return redirect(route('employees.index'));
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Request $request, $id)
   {
      $target = Employees::findOrFail($id);
      $target->delete();
      return ($request->ajax ? "OK" : redirect(route('employees.index')));
   }
}

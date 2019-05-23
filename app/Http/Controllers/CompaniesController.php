<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompaniesStoreRequest;
use App\Companies;
use App\User;
use Storage;
use Mail;

class CompaniesController extends Controller
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
      return view("companies.index");
   }

   public function data(Request $request)
   {
      return datatables()->of(Companies::query())->toJson();
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view("companies.create");
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(CompaniesStoreRequest $request)
   {
      $data = $request->validated();

      if ($request->has('logo')) {
         $data['logo'] = $request->file('logo')->hashName();
         $request->file('logo')->store('public');
      }

      Companies::create($data);

      Mail::raw(__("Company :name has been created!", ['name' => $data['name']]), function($message)
   	{
   		$message->to('dariaus.lapinsko@gmail.com');
   	});

      return redirect(route('companies.index'));
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
      $data = Companies::findOrFail($id);
      return view("companies.edit", compact("data"));
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(CompaniesStoreRequest $request, $id)
   {
      $data = $request->validated();
      $target = Companies::findOrFail($id);

      if ($request->has('remove_image')) {
         $data['logo'] = null;
         Storage::delete('public/' . $target->logo);
      }

      if ($request->has('logo')) {
         $data['logo'] = $request->file('logo')->hashName();
         $request->file('logo')->store('public');
      }

      $target->update($data);

      return redirect(route('companies.index'));
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy(Request $request, $id)
   {
      $target = Companies::findOrFail($id);
      Storage::delete('public/' . $target->logo);
      $target->delete();
      return ($request->ajax ? "OK" : redirect(route('companies.index')));
   }
}

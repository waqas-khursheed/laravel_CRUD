<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\shark;

class sharkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sharks = shark::all();

        // load the view and pass the sharks
        return \View::make('sharks.index')
            ->with('sharks', $sharks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/sharks/create.blade.php)
        return \View::make('sharks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'shark_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('sharks/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $shark = new shark;
            $shark->name       = Input::get('name');
            $shark->email      = Input::get('email');
            $shark->shark_level = Input::get('shark_level');
            $shark->save();

            // redirect
            Session::flash('message', 'Successfully created shark!');
            return Redirect::to('sharks');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          // get the shark
          $shark = shark::find($id);

          // show the view and pass the shark to it
          return View::make('sharks.show')
              ->with('shark', $shark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shark = shark::find($id);

        // show the edit form and pass the shark
        return View::make('sharks.edit')
            ->with('shark', $shark);
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
          // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'shark_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('sharks/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $shark = shark::find($id);
            $shark->name       = Input::get('name');
            $shark->email      = Input::get('email');
            $shark->shark_level = Input::get('shark_level');
            $shark->save();

            // redirect
            Session::flash('message', 'Successfully updated shark!');
            return Redirect::to('sharks');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // delete
         $shark = shark::find($id);
         $shark->delete();
 
         // redirect
         Session::flash('message', 'Successfully deleted the shark!');
         return Redirect::to('sharks');
    }
}

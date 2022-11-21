<?php

namespace App\Http\Controllers;

use App\Models\User;
use Eloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * * @mixin Eloquent
 */
class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id){

        return tap(User::findOrFail($id))->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return tap(User::findOrFail($id))->delete();
    }
}

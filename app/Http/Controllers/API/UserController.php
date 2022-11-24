<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Eloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * * @mixin Eloquent
 */
class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse($users,"Users Fetched.");
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        return $this->sendResponse(User::create($inputs),"User created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if (is_null($user)){
            return $this->sendError('User does not exist.');
        }
        return $this->sendResponse($user,"User Fetched.");

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id){
        $inputs = $request->all();
        if (empty($inputs)){
            return $this->sendError("No data received.");
        }
        $userUpdated = tap(User::findOrFail($id))->update($request->all());
        return $this->sendResponse($userUpdated,"User updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return $this->sendResponse([],"Product deleted.");
    }
}

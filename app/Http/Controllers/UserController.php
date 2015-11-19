<?php

namespace cinema\Http\Controllers;

use cinema\User;
use Illuminate\Http\Request;

use cinema\Http\Requests;
use cinema\Http\Requests\UserCreateRequest;
use cinema\Http\Requests\UserUpdateRequest;
use cinema\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $user=new User();
        $user->setName(Input::get('name'));
        $user->setEmail(Input::get('email'));
        $user->setPassword(Input::get('password'));
        $user->setSwActivo(Input::get('sw_activo'));
        if($user->guardar())
        {
            Session::flash('message','Usuario creado Correctamente');
            return Redirect::to('/users');
        }

    }

    public function update(Request $request, $id)
    {

        $user = new User();
        $user->setId($id);
        $user->setName(Input::get('name'));
        $user->setEmail(Input::get('email'));
        $user->setPassword(Input::get('password'));
        $user->setSwActivo(Input::get('sw_activo'));
        if($user->modificar())
        {
            Session::flash('message','Usuario Actualizado Correctamente');
            return Redirect::to('/users');
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',['user'=>$user]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

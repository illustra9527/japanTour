<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{

    public function index(){


        $items = Auth::user()->all();

        return view('admin.account.index', compact('items'));
    }


    public function create(){

        return view('admin.account.create');
    }
    public function store(Request $request){

        $account = $request->all();
        $this->validator($account)->validate();
        $this->account_create($account);

        return redirect('admin/account');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function account_create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function edit($id){
        $item = User::find($id);

        return view('admin.account.edit', compact('item'));
    }
    public function update(Request $request, $id){

        User::find($id)->update($request->all());

        return redirect('admin/account');
    }
    public function destroy($id){

        User::destroy($id);

        return redirect('admin/account');

    }

    public function select($role){

        $items = User::where('role',$role)->get();

        return view('admin.account.index',compact('items'));
    }


}



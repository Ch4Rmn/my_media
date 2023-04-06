<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
// Show User Data in DB When U register
    public function profile(){

      $id = Auth::user()->id;

    $userData = User::select('id','name', 'email' ,'phone' , 'address', 'gender')->where('id' , $id)->first();

    return view('admin.Profile.index' , compact('userData'));   }

// Update User Data with $input->data
    public function update (Request $request) {
       $user = $this->getUserData($request);
        $validator = $this->validatorCheck($request);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
                ->withInput();
        }
    //    dd($user);
     User::where('id', Auth::user()->id)-> update($user);
    return back()->with(['updateSuccess'=>'Update Success! OK sir.']);

   }

//    get user data from Input
private function getUserData($request){
return [
    'name' => $request->adminName ,
    'email' => $request->adminEmail ,
    'phone' => $request->adminPhone ,
    'address' => $request->adminAddress ,
    'gender' => $request->adminGender
];
}

// validation
private function validatorCheck($request){
        $validationRules = [
                'adminName' => 'required|unique:user,name',
                'adminEmail' => 'required',
                'adminPhone' => 'required',
                'adminAddress' => 'required',
        ];
        $validationMessage = [
            'adminName.required' => 'name is required',
            'adminEmail.required' => 'email  is required',
            'adminPhone.required' => 'Phone is required' ,
            'adminAddress.required' => 'Address is required' ,
        ];
        return Validator::make($request->all(), $validationRules, $validationMessage)->validate();
    }

}


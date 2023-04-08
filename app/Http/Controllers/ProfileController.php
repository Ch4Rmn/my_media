<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
// Show User Data in DB When U register
    public function profile(){
    $id = Auth::user()->id;

    $userData = User::select('id','name', 'email' ,'phone' , 'address', 'gender')->where('id' , $id)->first();

    return view('admin.Profile.index' , compact('userData'));
}

// Update User Data with $input->data
    public function update(Request $request) {
       $user = $this->getUserData($request);
        $validator = $this->validatorCheck($request);

    //    dd($user);
     User::where('id', Auth::user()->id)->update($user);
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
   $validationRule = [
    "adminName" => "required",
    "adminAddress" => "required",
    "adminPhone" => "required",
    "adminEmail" => "required|unique:users,email|min:8"
];
$validationMessage =[
    'adminName.required' => 'name ဖြည့်ပါ',
    'adminPhone.required' => 'Phone ဖြည့်ပါ' ,
            'adminAddress.required' => 'Address ဖြည့်ပါ',
    'adminEmail.unique' => 'email ဖြည့်ပါ',

];
Validator::make($request->all(), $validationRule,$validationMessage)->validate();
}

// Change Password
//direct changePassword Page
public function directChangePasswordPage(){
    return view('admin.Profile.changePassword');
}
//changePassword
public function ChangePasswordPage(Request $request){
     // dd($request->all());
    $validateForPass = $this->changePasswordValidationCheck($request);

    $dbUser = User::where('id', auth::user()->id)->first();
    $dbPass = $dbUser->password;
    // dd($dbPass);
    // $userOldPass = Hash::make($request->adminOldPassword);

    $userNewPass = Hash::make($request->adminNewPassword);
    $updateNewPass = [
        'password' => $userNewPass
    ];

    if(Hash::check($request->adminOldPassword,$dbPass)){
         User::where('id', auth::user()->id)->update($updateNewPass);
        return redirect()->route('dashboard');

    } else
     return back()->with(['passUpdateFail'=>'update fail']);


}

//private validation pass
private function changePasswordValidationCheck($request){
        $validationRulesPass = [
            'adminOldPassword' => 'required',
            'adminNewPassword' => 'required|min:8',
            'adminConfirmPassword' => 'required|same:adminNewPassword|min:8'
        ];
        $validationMessagePass = [
            'adminOldPassword.required' => 'old pass need to fill',
            'adminNewPassword.required' => 'New pass need to fill',
            'adminConfirmPassword.required' => 'Confirm pass need to fill',
            'adminNewPassword.min' => 'New pass need to min 8',
            'adminConfirmPassword.min' => 'Confirm pass need to 8',
            'adminConfirmPassword.required' => 'Confirm pass need to fill',
            'adminConfirmPassword.same' => ' confirmPass need to same with newPassword',
        ];
        validator::make($request->all(), $validationRulesPass, $validationMessagePass)->validate();

}
}

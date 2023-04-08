<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //List with Paginate
    public function list() {
        $userData = User::orderBy('created_at', 'desc')->paginate(3);
        // dd($userData);
        $userData->appends(request()->all());
        return view('admin.List.list' , compact('userData'));
    }

    //List Delete
    public function listDelete($id){
        $clickID = $id;
        compact('clickID');
    User::where('id', $id )->delete();
    return back()->with(['delete'=>'we delete ur data sir...']);
    }

    // List Search
    public function listSearch(Request $request){
      $userData =  User::orWhere('name','LIKE','%'.$request->adminSearchKey .'%')
            ->orWhere('email', 'LIKE', '%' . $request->adminSearchKey . '%')
            ->orWhere('phone', 'LIKE', '%' . $request->adminSearchKey . '%')
            ->orWhere('address', 'LIKE', '%' . $request->adminSearchKey . '%')
            ->orWhere('gender', 'LIKE', '%' . $request->adminSearchKey . '%')
            ->get();
        return view('admin.List.list', compact('userData'));
    }
}

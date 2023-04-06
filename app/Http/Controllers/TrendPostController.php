<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    public function trendPost(){
        return view('admin.TrendPost.trendPost');
    }
}

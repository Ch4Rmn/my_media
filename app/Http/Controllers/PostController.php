<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Carbon;

class PostController extends Controller
{
    //Route and show
    public function post() {
        $category = Category::get();
        $Post = Post::get();
        return view('admin.Post.post',compact('category', 'Post'));
    }

    //create
    public function createPost(Request $request){
        $validationCheck = $this->validatorCheck($request);

        // postImage
        $file = $request->file('postImage');
        $imgName = uniqid().'_'. $file->getClientOriginalName();
        $file->move(public_path().'/imgFolder', $imgName);

        $Data =  $this->getData($request);
        $Data['image'] = $imgName;
        Post::create($Data);
        return back()->with(['complete' => 'Category Created!']);
    }

    private function getData($request)
    {
        // $Data['image'] = $imgName;
        return [
            'post_id' => $request->post_id,
            'title' => $request->postName,
            'description'   => $request->postDescription,
            // 'image' => $imgName ,
            'category_id' => $request->postCategories,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

    }

    private function validatorCheck($request)
    {
        $validationRulesPass = [
            'postName' => 'required',
            'postDescription' => 'required|min:8',
            'postImage' => 'required',
            // 'post' => 'required',
        ];
        $validationMessagePass = [
            'postName.required' => 'title need to fill',
            'postDescription.required' => 'description need to fill',
            'postImage.required' => 'image need to fill',
        ];
        validator::make($request->all(), $validationRulesPass, $validationMessagePass)->validate();
    }

    }


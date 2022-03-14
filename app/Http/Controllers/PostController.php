<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public $postRepository;
    public function __construct(PostRepositories $postRepository )
    {
            $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        // dd($posts);
        return view('backend.post.index',compact('posts'));
    }

    public function create()
    {
        return view('backend.post.create');
    }

    public function store(Request $request)
    {
        $data = $request->only('content','user_id');
        $fileName = time().'_'.$request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs("images",$fileName,"public");
        $data["img"] = $path;
        DB::table('posts')->insert($data);
        return redirect()->route('home');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

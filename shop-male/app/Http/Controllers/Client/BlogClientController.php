<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogClientController extends Controller
{
    public function index()
    {
        return view('my-directory.blog');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('my-directory.blog-details',['id' => $id]);
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

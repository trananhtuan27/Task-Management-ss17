<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }
    public function store(Request $request){
$validatedDate = $request->validate([
    'number' => 'required|numeric',
    ]);
echo "đã xác nhận thành công";
    }
}

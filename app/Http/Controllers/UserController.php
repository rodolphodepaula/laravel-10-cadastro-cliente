<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level')->only('edit');
    }
    public function index()
    {
        return view('users.index',[
            'users' => User::orderBy('name')->paginate('5')
        ]);
    }

    public function edit(int $id)
    {
        return view('users.edit', [
            'user' => User::findOrFail($id),
        ]);
    }

    public function update(Request $request)
    {
        User::findOrFail($request->id)->update($request->all());

        return view('users.index',[
            'users' => User::orderBy('name')->paginate('5')
        ]);
    }

}

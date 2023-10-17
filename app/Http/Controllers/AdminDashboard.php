<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function index()
    {
        $users = User::where(['role_id' => 2])->get();
        $categories = Categories::where(['parent_id' => 0])->get();
        return view('adminDashboard', compact('users', 'categories'));
    }
}

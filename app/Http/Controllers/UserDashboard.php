<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    public function index($id = '')
    {
        $user = Auth::user();
        if ($id != '') {
            $user = User::where(['id' => $id])->first();
            if (!$user) {
                return redirect('adminDashboard');
            }
        }
        return view('userDashboard', compact('user'));
    }
}

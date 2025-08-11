<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\konsultasi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Logic for admin dashboard
        $konsultasi = konsultasi::with(['psikolog' => function ($query) {
        $query->where('role', 'psikolog');
    }, 'klien' => function ($query) {
        $query->where('role', 'user');
    }])->get();
        $totalUsers = User::count(); // Total all users
        $countUser = User::where('role', 'user')->count(); // Count clients
        $countPsikolog = User::where('role', 'psikolog')->count(); // Count psychologists
        
        return view('admin.dashboard.index', compact('konsultasi' ,'totalUsers', 'countUser', 'countPsikolog'));
    }

    // Add other admin-related methods here
    // For example, managing users, content, etc.
}

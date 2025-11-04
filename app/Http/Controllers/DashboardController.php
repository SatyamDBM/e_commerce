<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // optional: redirect to user/admin dashboard depending on role
    public function home()
    {
        $user = Auth::user();
        if ($user->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    }

    // show logged-in user's data (private profile view)
    public function userDashboard()
    {
        $user = Auth::user();

        // mask password display (don't show plain)
        $maskedPassword = str_repeat('*', 8);

        return view('user.dashboard', compact('user', 'maskedPassword'));
    }

    public function adminDashboard()
    {
        $user = Auth::user();

        if ($user->usertype !== 'admin') {
            abort(403, 'Unauthorized Access');
        }
        $users = User::orderBy('id', 'asc')->get();
        $usersCount = User::count();
        $productsCount = Product::count();
        // $ordersCount = Order::count();

        // $revenue = Order::sum('total_price');
        // $pendingOrders = Order::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'users',
            'usersCount',
            'productsCount',
       
        ));
    }

    // Admin: delete user
    public function deleteUser($id)
    {
        $me = Auth::user();
        if ($me->usertype !== 'admin') {
            abort(403);
        }

        // prevent deleting self (optional)
        if ($me->id == $id) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted.');
    }

    // Admin: edit form
    public function editUserForm($id)
    {
        $me = Auth::user();
        if ($me->usertype !== 'admin') abort(403);

        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    // Admin: update user
    public function updateUser(Request $request, $id)
    {
        $me = Auth::user();
        if ($me->usertype !== 'admin') abort(403);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email|max:255',
            'mobile' => 'nullable|string|max:25',
            'address'=> 'nullable|string|max:500',
        ]);

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'User updated.');
    }
     
    public function userProfile_Upload(Request $request)
    {
    $user = auth()->user();
    if (!$user) {
        return back()->with('error', 'User not authenticated!');
    }
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $user->profile_photo = $filename;
        $user->save();

        return back()->with('success', 'Profile photo updated successfully!');
    } else {
        return back()->with('error', 'No file selected!');
    }
    }


    
}

<?php

namespace App\Http\Controllers\Admins;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me');
        
        if (auth()->guard('admin')->attempt([
            'email' => $request->input("email"),
            'password' => $request->input("password")
        ], $remember_me)) {
            return redirect()->route('admins.dashboard');
        }
        
        return redirect()->back()->with(['error' => 'Invalid credentials']);
    }

    public function index()
    {
        $borrowedBooks = \DB::table('borrowed_products')
            ->whereNull('returned_at')
            ->count();
            
        $allbooks = Product::count();
        $allusers = User::count();
        $alladmins = Admin::count();

        return view('admins.index', compact('borrowedBooks', 'allbooks', 'allusers', 'alladmins'));
    }

    public function DisplayAllUsers()
    {
        $allusers = User::orderBy('id', 'asc')->get();
        return view('admins.allusers', compact('allusers'));
    }

    public function CreateAdmin()
    {
        return view('admins.createadmin');
    }

    public function StoreAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
        ]);

        Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'New Admin Added');
    }

    public function viewUser(Request $request)
    {
        $userId = $request->input('userId');
        $viewuser = User::with(['borrowedProducts' => function($query) {
            $query->whereNull('returned_at');
        }])->findOrFail($userId);

        return view('admins.veiwuser', compact('viewuser'));
    }

    public function DisplayProducts()
    {
        $products = Product::orderBy('id', 'asc')->get();
        return view('admins.allproducts', compact('products'));
    }

    public function CreateProduct()
    {
        return view('admins.createproduct');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images'), $imageName);

        Product::create([
            "name" => $request->name,
            "img" => $imageName,
            "description" => $request->description,
        ]);

        return redirect()->back()->with('success', 'New Product Added');
    }

    public function deleteProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Check if product is currently borrowed
        if ($product->isBorrowed()) {
            return redirect()->back()->with('error', 'Cannot delete product while it is borrowed');
        }

        // Delete the image if it exists
        if ($product->img && File::exists(public_path('assets/images/' . $product->img))) {
            File::delete(public_path('assets/images/' . $product->img));
        }

        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}

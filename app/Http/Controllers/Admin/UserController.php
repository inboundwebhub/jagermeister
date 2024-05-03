<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user|view-only', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = User::all();

        return view('admin.users.index', compact('data'));

        // return response()->json($data);
    }

    
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->prize_id= $request->prize_id;
        $user->address = $request->address;
        $user->tshirt_size = $request->tshirt_size;
        $user->save();

        toastr()->success('User updated successfully');
        return redirect()->route('users.index');
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
    
        if (!$user->hasRole('admin')) {
            $user->delete();
            toastr()->success('User deleted successfully');
            return redirect()->route('users.index');
            // return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } else {
            toastr()->error('Admin users cannot be deleted');
            return redirect()->route('users.index');
        }
    }
    
}

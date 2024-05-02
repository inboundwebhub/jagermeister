<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prize;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PrizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-prize|edit-prize|delete-prize|view-only', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-prize', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-prize', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-prize', ['only' => ['destroy']]);
    }

    public function index() 
    {
        $data = prize::all();
        // dd($data);
        return view('admin.prizes.index', compact('data'));

        // return response()->json($data);
    }

    public function edit(string $id)
    {
        $prize = prize::find($id);
        // dd($data);
        return view('admin.prizes.edit', compact('prize'));
    }

    public function update(Request $request, string $id)
    {
    // dd($request);

        // Validate the request
        $validatedData = $request->validate([
            'prize_type' => 'required|string',
            'prize_number' => 'nullable|integer',
            'assigned' => 'nullable', // Ensure it's boolean
            'confirmed' => 'nullable', // Ensure it's boolean
        ]);
        
        // Find the prize by ID
        $prize = Prize::findOrFail($id);
        
        // Update prize details
        $prize->prize_type = $request->prize_type;
        $prize->prize_number = $request->prize_number;
        $prize->assigned = $request->assigned; // Use lowercase
        $prize->confirmed = $request->confirmed; // Use lowercase
        $prize->save();
        
        // Redirect to a view or route after updating the prize
        return redirect()->route('admin.prizes.index')->with('success', 'Prize updated successfully');
    }

    public function destroy(string $id)
    {
        $Prize = Prize::find($id);

        $Prize->delete();

        // Return success response
        return redirect()->route('admin.prizes.index')->with('success', 'prize deleted successfully');
    }
    
}

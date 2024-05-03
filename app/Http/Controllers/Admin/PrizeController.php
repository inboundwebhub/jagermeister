<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prize;
use App\Exports\PrizesExport;
use App\Imports\PrizesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

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

        if(request()->ajax()) {
        $data = prize::all();
        return datatables()->of($data)
            ->addColumn('action', 'admin.prizes.action_button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
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
        toastr()->success('Prize updated successfully');
        return redirect()->route('admin.prizes.index');
    }
    public function export()
    {
        //  dd(request()->all());
        toastr()->success('exported successfully');
        return Excel::download(new PrizesExport, 'prizes.xlsx');
        // return back();
    }

    public function import(Request $request)
    {
        $attributes = $request->validate([
            'file' => [
                'required',
                'file', // Ensure it's a file
                'mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/csv', // XLSX and CSV
            ],
        ]);
        

        Excel::import(new PrizesImport, $request->file('file'));
        toastr()->success('imported successfully');
        return back();
    }
    public function destroy(string $id)
    {
        $Prize = Prize::find($id);

        $Prize->delete();
        toastr()->success('prize deleted successfully');
        return redirect()->route('admin.prizes.index');
        // Return success response
        // return redirect()->route('admin.prizes.index')->with('success', 'prize deleted successfully');
    }
}

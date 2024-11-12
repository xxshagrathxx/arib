<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

use DataTables;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Department::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->name;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="text-end">';
                        if(auth()->user()->can('update_departments')) {
                            $btn .= '<a title="'.transWord('edit').'" href="'.route('departments-edit', $row->id).'" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>';
                        }
                        if(auth()->user()->can('delete_departments')) {
                            $btn .= '<a title="'.transWord('delete').'" id="deletedep" href="'.route('departments-delete', $row->id).'" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>';
                        }
                        $btn .= '</div>';
                        return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments,name',
        ],[
            'name.required' => transWord('This field is required'),
            'name.unique' => transWord('This name already exists'),
        ]);

        $department = Department::create([
            'name' => $request->name,
        ]);

        $notification = array(
			'message' => transWord('Department created successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('departments.all')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('pages.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,'.$id,
        ],[
            'name.required' => transWord('This field is required'),
            'name.unique' => transWord('This name already exists'),
        ]);

        $department = Department::findOrFail($id);

        $department->update([
            'name' => $request->name,
        ]);

        $notification = array(
			'message' => transWord('Department updated successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('departments.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        
        if($department->employees()->exists()) {
            $notification = array(
                'message' => transWord('This Department contains employees, Cannot be deleted !!'),
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }

        $department->delete();

        $notification = array(
			'message' => transWord('Department deleted successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('departments.all')->with($notification);
    }

    public function search()
    {
        $results = DB::table('departments as d')
                    ->leftJoin('employees as e', 'd.id', '=', 'e.department_id')
                    ->select('d.name as department_name', DB::raw('COUNT(e.id) as employee_count'), DB::raw('SUM(e.salary) as total_salaries'))
                    ->groupBy('d.name')
                    ->get();

        return view('pages.departments.search', compact('results'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

use DataTables;
use Illuminate\Support\Facades\Hash;
use Image;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                        return '<img src="'.asset('uploads/users/'.$row->user->avatar).'" style="border-radius: 50%; width: 40px" />';
                    })
                    ->addColumn('first_name', function($row){
                        return $row->first_name;
                    })
                    ->addColumn('last_name', function($row){
                        return $row->last_name;
                    })
                    ->addColumn('salary', function($row){
                        return $row->salary;
                    })
                    ->addColumn('parent_id', function($row){
                        if($row->parent_id == null)
                            return '<span class="badge bg-success">Yes</span>';
                        else
                            return '<span class="badge bg-danger">No</span>';
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="text-end">';
                        if(auth()->user()->can('update_employees')) {
                            $btn .= '<a title="'.transWord('edit').'" href="'.route('employees-edit', $row->id).'" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>';
                        }
                        if(auth()->user()->can('delete_employees')) {
                            $btn .= '<a title="'.transWord('delete').'" id="delete" href="'.route('employees-delete', $row->id).'" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>';
                        }
                        $btn .= '</div>';
                        return $btn;
                    })->rawColumns(['image', 'parent_id', 'action'])
                    ->make(true);
        }
        return view('pages.employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        $managers = Employee::where('parent_id', null)->get();
        return view('pages.employees.create', compact('roles', 'departments', 'managers'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'salary' => 'required|numeric|min:0',
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required|unique:users,phone',
            'role_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg,webp,gif,svg|max:2048',
        ],[
            'first_name.required' => transWord('This field is required'),
            'last_name.required' => transWord('This field is required'),
            'salary.required' => transWord('This field is required'),
            'salary.numeric' => transWord('The salary must be a number.'),
            'salary.min' => transWord('The salary must be at least 0.'),
            'department_id.required' => transWord('This field is required'),
            'name.required' => transWord('This field is required'),
            'email.required' => transWord('This field is required'),
            'email.unique' => transWord('This email already exists'),
            'email.email' => transWord('This field must be in an email format'),
            'password.required' => transWord('This field is required'),
            'password.confirmed' => transWord('Passwords don\'t match'),
            'password.min' => transWord('Password must be 8 characters or more'),
            'role_id.required' => transWord('This field is required'),
            'image.mimes' => 'The image must be of type (jpeg,png,jpg,webp,gif,svg)',
            'image.max' => 'The image size cannot be larger than 2MB',
        ]);

        $save_url = 'default.png';

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/users/'.$name_gen);
            $save_url = $name_gen;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'avatar' => $save_url,
        ]);

        $role = Role::findOrFail($request->role_id);
        $user->assignRole($role->name);

        $employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'salary' => $request->salary,
            'department_id' => $request->department_id,
            'parent_id' => $request->parent_id,
            'user_id' => $user->id,
        ]);

        $notification = array(
			'message' => transWord('Employee created successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('employees.all')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $departments = Department::all();
        $managers = Employee::where('parent_id', null)->get();
        $employee = Employee::findOrFail($id);
        return view('pages.employees.edit', compact('roles', 'departments', 'managers', 'employee'));
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
        $employee = Employee::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'salary' => 'required|numeric|min:0',
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$employee->user->id,
            'password' => 'nullable|confirmed|min:8',
            'phone' => 'required|unique:users,phone,'.$employee->user->id,
            'role_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg,webp,gif,svg|max:2048',
        ],[
            'first_name.required' => transWord('This field is required'),
            'last_name.required' => transWord('This field is required'),
            'salary.required' => transWord('This field is required'),
            'salary.numeric' => transWord('The salary must be a number.'),
            'salary.min' => transWord('The salary must be at least 0.'),
            'department_id.required' => transWord('This field is required'),
            'name.required' => transWord('This field is required'),
            'email.required' => transWord('This field is required'),
            'email.unique' => transWord('This email already exists'),
            'email.email' => transWord('This field must be in an email format'),
            'password.confirmed' => transWord('Passwords don\'t match'),
            'password.min' => transWord('Password must be 8 characters or more'),
            'role_id.required' => transWord('This field is required'),
            'image.mimes' => 'The image must be of type (jpeg,png,jpg,webp,gif,svg)',
            'image.max' => 'The image size cannot be larger than 2MB',
        ]);

        $old_img = $request->old_img;
        $save_url = $old_img;

        if ($request->file('image')) {
            if (!str_contains($old_img, 'default.png')) {
                unlink('uploads/users/'.$old_img);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/users/'.$name_gen);
            $save_url = $name_gen;
        }

        if($request->password) {
            $employee->user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'avatar' => $save_url,
            ]);
        } else {
            $employee->user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'avatar' => $save_url,
            ]);
        }

        $role = Role::findOrFail($request->role_id);
        $employee->user->syncRoles($role->name);

        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'salary' => $request->salary,
            'department_id' => $request->department_id,
            'parent_id' => $request->parent_id,
        ]);

        $notification = array(
			'message' => transWord('Employee updated successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('employees.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->user->avatar != 'default.png') {
            unlink('uploads/users/'.$employee->user->avatar);
        }

        $employee->delete();
        $employee->user->delete();

        $notification = array(
			'message' => transWord('Employee deleted successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('employees.all')->with($notification);
    }
}

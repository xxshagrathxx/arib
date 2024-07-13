<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;

use DataTables;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($request->ajax()) {
            if ($user->employee->parent_id == null) {
                $data = Task::where('assigner_id', $user->employee->id)->get(); //To get the manager tasks
            } else {
                $data = Task::where('assignee_id', $user->employee->id)->get(); //To get the employee tasks
            }
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->name;
                    })
                    ->addColumn('status', function($row){
                        if($row->status == 'Backlog')
                            return '<span class="badge bg-dark">'.$row->status.'</span>';
                        elseif($row->status == 'In Progress')
                            return '<span class="badge bg-info">'.$row->status.'</span>';
                        elseif($row->status == 'Done')
                            return '<span class="badge bg-success">'.$row->status.'</span>';
                    })
                    ->addColumn('action', function($row) use ($user) {
                        $btn = '<div class="text-end">';
                        if(auth()->user()->can('update_tasks')) {
                            $btn .= '<a title="'.transWord('edit').'" href="'.route('tasks-edit', $row->id).'" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>';
                        }
                        if(auth()->user()->can('delete_tasks') && $user->employee->parent_id == null) {
                            $btn .= '<a title="'.transWord('delete').'" id="deletedep" href="'.route('tasks-delete', $row->id).'" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>';
                        }
                        $btn .= '</div>';
                        return $btn;
                    })->rawColumns(['status', 'action'])
                    ->make(true);
        }
        return view('pages.tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $assignees = Employee::where('parent_id', $user->employee->id)->get();
        return view('pages.tasks.create', compact('assignees'));
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
            'name' => 'required',
            'assignee_id' => 'required',
            'status' => 'required',
        ],[
            'name.required' => transWord('This field is required'),
            'assignee_id.required' => transWord('This field is required'),
            'status.required' => transWord('This field is required'),
        ]);

        $user = auth()->user();

        $task = Task::create([
            'name' => $request->name,
            'assigner_id' => $user->employee->id,
            'assignee_id' => $request->assignee_id,
            'status' => $request->status,
        ]);

        $notification = array(
			'message' => transWord('Task created successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('tasks.all')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('pages.tasks.edit', compact('task'));
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
        $task = Task::findOrFail($id);

        $task->update([
            'status' => $request->status,
        ]);

        $notification = array(
			'message' => transWord('Task updated successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('tasks.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        $notification = array(
			'message' => transWord('Task deleted successfully !!'),
			'alert-type' => 'success'
		);

        return redirect()->route('tasks.all')->with($notification);
    }
}

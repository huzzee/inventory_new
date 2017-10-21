<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\MyDepartment;

class MyDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = MyDepartment::all();
        return view('pages.departments.department',array(
            'departments' => $departments
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->status == null)
        {
            $status = 0;
        }
        else{
            $status = 1;
        }

        $department = new MyDepartment([
            'department_name' => $request->department_name,
            'status' => $status
        ]);

        $department->save();

        return redirect('departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(MyDepartment $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(MyDepartment $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyDepartment $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = MyDepartment::findOrFail($id);

        $department->status = 0;

        $department->save();

        return redirect('departments');
    }
}

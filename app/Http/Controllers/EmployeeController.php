<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        $employeesCount = Employee::count();

        return view("admin.pages.Employees.index", [
            "employees" => $employees,
            "employeesCount" => $employeesCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.Employees.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "email" => "required|email|max:255|unique:employees",
            "phone" => "string|max:20",
            "city" => "string|max:100",
            "salary" => "numeric|min:0",
            "department" => "string|max:100",
            "description" => [
                "string",
                "max:1000",
                function ($attribute, $value, $fail) {
                    if (preg_match('/اسرائيل|\+972|972|(i|I)srael|(il|IL)/i', $value)) {
                        $fail('The ' . $attribute . ' field cannot contain the word "اسرائيل".');
                    }
                }
            ],

        ]);

        Employee::create($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('admin.pages.Employees.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('admin.pages.Employees.edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'phone' => 'string|max:20',
            'city' => 'string|max:100',
            'salary' => 'numeric|min:0',
            'department' => 'string|max:100',
            'description' => [
                "string",
                "max:1000",
                function ($attribute, $value, $fail) {
                    if (preg_match('/اسرائيل|\+972|972|(i|I)srael|(il|IL)/i', $value)) {
                        $fail('The ' . $attribute . ' field cannot contain the word "اسرائيل".');
                    }
                }
            ],
        ]);
        $employee->update($request->all());
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}

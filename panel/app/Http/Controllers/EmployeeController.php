<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeFormRequest;
use App\Http\Requests\UpdateEmployeeFormRequest;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeFormRequest $request)
    {
        $data = $request->except('_token');
        try {
            $employee = Employee::create($data);

            if(!$employee) {
                return redirect()->back()->with('error', 'Não foi possível cadastrar o funcionário.');
            }

            return redirect()->route('employees.index')->with('success', 'Funcionário cadastrado com sucesso.');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível cadastrar o funcionário.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('id', $id)->with('company')->first();

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id', $id)->with('company')->first();
        $companies = Company::all();

        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeFormRequest $request, $id)
    {
        $data = $request->except('_token');
        try {
            $employee = Employee::find($id);
            $employee->update($data);

            return redirect()->route('employees.index')->with('success', 'Funcionário atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível atualizar o funcionário.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);
            $employee->delete();

            return redirect()->route('employees.index')->with('success', 'Funcionário deletado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível deletar o funcionário.');
        }
    }
}

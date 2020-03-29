<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreCompanyFormRequest;
use App\Http\Requests\UpdateCompanyFormRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyFormRequest $request)
    {
        $data = $request->except('_token');

        // Upload de foto
        if($request->hasFile('image')) {
            $url = env('UPLOAD_URL', 'http://10.10.10.7:2222/upload.php');
            $image = $request->file('image');
            $response = Http::attach('image', file_get_contents($image), $image->getClientOriginalName())
                ->post($url);

            $result = $response->json();

            $data['image'] = $result['name'];
        }

        try {
            $company = Company::create($data);

            if(!$company) {
                return redirect()->back()->with('error', 'Não foi possível cadastrar a empresa.');
            }

            return redirect()->route('companies.index')->with('success', 'Empresa cadastrada com sucesso.');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível atualizar a empresa.');
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
        $company = Company::where('id', $id)->with('employees')->first();

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyFormRequest $request, $id)
    {
        $data = $request->except('_token');
        try {
            $company = Company::find($id);
            $company->update($data);

            return redirect()->route('companies.index')->with('success', 'Empresa atualizada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível atualizar a empresa.');
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
            $company = Company::find($id);
            $company->delete();

            return redirect()->route('companies.index')->with('success', 'Empresa deletada com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível deletar a empresa.');
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();

        return response()->json($companies);
    }

    public function employees($id) {
        $company = Company::find($id);

        return response()->json($company->employees);
    }
}

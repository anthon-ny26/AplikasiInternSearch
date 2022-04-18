<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Models\review;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $dbcompany = company::latest();

        if (request('search')) {
            $dbcompany->where('name', 'like', '%' . request('search') . '%');
        }

        return view('home', [
            "dbcompany" => $dbcompany->paginate(9)
        ]);
    }

    public function show($id)
    {
        return view('company', [
            "company" => company::find($id),
            "rating" => review::getRating($id),
            "like" => review::getLike($id),
        ]);
    }
}

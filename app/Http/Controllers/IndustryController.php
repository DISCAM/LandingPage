<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IndustryRepository;
class IndustryController extends Controller
{
    public function index(IndustryRepository $industryRepo)
    {
        $industries = $industryRepo->getAll();
        return view('industry.industry', [
           'lista' => $industries,
           'title' => 'Industries'
        ]);
    }
}

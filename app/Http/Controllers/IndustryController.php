<?php

namespace App\Http\Controllers;

use App\Models\Industry;
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

    public function create()
    {
        return view('industry.create', [
            'title' => 'Industries'
        ]);
    }
    public function store(Request $request)
    {
        $industry = new Industry();
        $industry->description = $request->input('description');
        $industry->industry_name = $request->input('name');
        $industry->save();
        return redirect()
            ->route('industry.index')
            ->with('success', 'Branża została dodana.');



    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function renderCreatePage(){
        $portfolioJobs = Portfolio::all();

        return view('createJobForPortfolio')->with('portfolioJobs', $portfolioJobs);
    }

    public function createJobForPortfolio(Request $request){
        $data = $request->all();

        $portfolioJob = Portfolio::create($data);

        return back();
    }

    public function deleteJob ($id)
    {
        $portfolioJob = Portfolio::find($id);
        if($portfolioJob) {
            $portfolioJob->delete();
        }
        return back();
    }
}

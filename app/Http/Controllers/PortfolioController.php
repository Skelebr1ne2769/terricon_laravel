<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function renderCreatePage(){
        $portfolioJobs = Portfolio::all();

        return view('createJobForPortfolio')->with('portfolioJobs', $portfolioJobs);
    }

    public function createJobForPortfolio(Request $request){

        $name = $request->get('name', '');
        $price = $request->get('price', 100);
        $val = $request->get('val', '$');

        $image = $request->file('image');

        if(isset($name)){
            if($image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $fileName = $image->storeAs('uploads', $fileName, 'public');
            }


            $portfolioJob = Portfolio::create([
                'name' => $name,
                'price' => $price,
                'val' => $val,

                'image' => $fileName
            ]);
        }

        if($portfolioJob){
            return redirect('create-job-for-portfolio');
        }else{
            return abort(400);
        }
    }

    public function deleteJob ($id)
    {
        $portfolioJob = Portfolio::find($id);

        if($portfolioJob) {
            $imagePath = $portfolioJob->image;
            $portfolioJob->delete();
            Storage::disk('public')->delete($imagePath);
        }

        return back();
    }

    public function renderUpdateJob($id){
        $portfolioJob = Portfolio::where('id', $id)->get();
        $vals = ['$', '€', '₸', '₽'];

        if($portfolioJob){
            return view('updateJob')
                ->with('portfolioJob', $portfolioJob[0])
                ->with('vals', $vals);
        }
    }

    public function updateJob(Request $request, $id){
        $portfolioJobs = Portfolio::where('id', $id)->get();
        $portfolioJob = $portfolioJobs[0];
        $image = $request->file('image');

        if($portfolioJob){
            $portfolioJob->name = $request->get('name');
            $portfolioJob->price = $request->get('price');
            $portfolioJob->val = $request->get('val');
            
            if($image){
                // delete old file
                Storage::disk('public')->delete($portfolioJob->image);

                // download new file
                $fileName = time() . '_' . $image->getClientOriginalName();
                $fileName = $image->storeAs('uploads', $fileName, 'public');

                $portfolioJob->image = $fileName;
            }

            $portfolioJob->save();

            return redirect('create-job-for-portfolio');
        }else{
            return abort(404);
        }
    }




    public function getApiJobs(){
        $portfolioJobs = Portfolio::all();

        return response()->json([
            'data' => $portfolioJobs,
            'count_data' => $portfolioJobs->count()
        ]);
    }

    public function createApiJobs(Request $request){
        $data = $request->all();
        $portfolioJob = null;

        if(isset($data['name'])){
            $portfolioJob = Portfolio::create($data);
        }

        return response()->json([
            'data' => $portfolioJob
        ]);
    }
}

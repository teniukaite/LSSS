<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::where('client_id', Auth::user()->id)->get();

//        $offers = Offers::sortBy('price',$request->sort ?? 'ASC')->get();
        $offers =  Offers::All();
//        $offers=Offers::All()->sortByDesc(function ($inquiry) {
//            return sprintf('%s', $inquiry->price);
//        })->values();

        return view('projects.index', compact('projects'),[
            'users' => User::All(),
            'offers'=>$offers]);
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

//    public function store(Request $request)
//    {
//        $projects = Project::where('client_id', Auth::user()->id)->get();
//        $includes= Project::get('fk_service_id');
////        dd(  $includes );
//        if ($projects->isNotEmpty())
//        {
//        foreach ($projects as $project) {
//            $service_id = $request['id'];
////            dd(  $service_id );
//            var_dump($project);
//              foreach ($includes as $include)
////        {
//            if ($project->fk_service_id != $include ) {
////                dd($project->fk_service_id);
//                Project::create([
//                    'client_id' => Auth::user()->id,
//                    'fk_service_id' => $request['id'],
//                    'fk_freelancer_id' => $request['freelancerId'],
//                    'price' => $request['price'],
//                ]);
//                return redirect::back()->with('success', 'Paslauga įtraukta į Jūsų kuriamą projektą');
//            }
//
//
//            else{
//                return redirect::back()->with('danger', 'Paslauga  jau yra įtraukta į Jūsų kuriamą projektą');
//            }
//        }
//        }
//    }
//        else {
//            Project::create([
//                'client_id' => Auth::user()->id,
//                'fk_service_id' => $request['id'],
//                'fk_freelancer_id' => $request['freelancerId'],
//                'price' => $request['price'],
//            ]);
//            return redirect::back()->with('success', 'Paslauga įtraukta į Jūsų kuriamą projektą');
//        }

//    }
//    public function store(Request $request)
//    {
////        $projects = Project::where('client_id', Auth::user()->id)->get();
//        $project = Project::find($request['id'])->where('client_id', Auth::user()->id)->get();
//        dd($project);
////        foreach ($projects as $project){
//            if ($project == null) {
//
//                Project::create([
//                    'client_id' => Auth::user()->id,
//                    'fk_service_id' => $request['id'],
//                    'fk_freelancer_id' => $request['freelancerId'],
//                    'price' => $request['price'],
//                ]);
//                return redirect::back()->with('success', 'Paslauga įtraukta į Jūsų kuriamą projektą');
//
//            } else {
//                return redirect::back()->with('danger', 'Paslauga  jau yra įtraukta į Jūsų kuriamą projektą');
//
//            }
//    }
    public function store(Request $request)
    {
        $projects = Project::where('client_id', Auth::user()->id)->get();
//        dd($projects);
//        $projects = Project::where('client_id', Auth::user()->id)->get('fk_service_id');
//        dd($projects);
//        $service_id = $request['id'];

       if ($projects->isNotEmpty()) {
           $counter = 0;
                    foreach ($projects as $project) {

                        if ($request['id'] != $project->fk_service_id) {
                            $counter++;
                            dd($counter);
                        }
                    }
       }
}
//                        if($counter>0)
//                        {
//
//                          Project::create([
//                                'client_id' => Auth::user()->id,
//                                'fk_service_id' => $request['id'],
//                                'fk_freelancer_id' => $request['freelancerId'],
//                                'price' => $request['price'],
//                            ]);
//
//                            return redirect::back()->with('success', 'Paslauga įtraukta į Jūsų kuriamą projektą');
//                        } else {
//                            return redirect::back()->with('danger', 'Paslauga  jau yra įtraukta į Jūsų kuriamą projektą');
//                        }


//                else {
//            Project::create([
//                'client_id' => Auth::user()->id,
//                'fk_service_id' => $request['id'],
//                'fk_freelancer_id' => $request['freelancerId'],
//                'price' => $request['price'],
//            ]);
//            return redirect::back()->with('success', 'Paslauga įtraukta į Jūsų kuriamą projektą');
//        }
//    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::where('id', $project->id)->delete();
//            $comparison->delete();
//            Comparison::where('offerId')>delete();
        return redirect::back()->with('success', 'Paslauga pašalinta iš projekto');
    }
}

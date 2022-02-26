<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use function PHPUnit\Framework\isNull;


class ProjectController extends Controller
{

    public function index()
    {
        $sum=0;
        $projects = Project::where('client_id', Auth::user()->id)->get();
        $projectsForSum=Project::where('client_id', Auth::user()->id)->where('status','=','0')->get();
        $offers =  Offers::All();
        $allProjects = Project::all();
        if ($projectsForSum != null) {
            for($i=0; $i<count($projectsForSum); $i++){
                if ($projectsForSum[$i]['price_content'] != 'EUR/VAL') {
                    $sum=$sum+$projectsForSum[$i]['price'];
                }
                else{
                    $temp = Offers::query()->where('id', '=', $projectsForSum[$i]['fk_service_id'])->get();
                    $sum=$sum+$projectsForSum[$i]['price']*$temp[0]['duration'];
                }

            }
        }

        return view('projects.index', compact('projects','sum'),[
            'users' => User::All(),
            'offers'=>$offers]);
    }

    public function create($id)
    {

        $offer = Offers::find($id);
        return view('projects.create', compact('offer'));
    }

    public function store(Request $request)
    {
        $projects = Project::where('client_id', Auth::user()->id)->get()->where('status','=','0');

        $id = [];

            foreach ($projects as $project) {
                if (!empty($project->fk_service_id))
                    array_push($id, $project->fk_service_id);
            }

            if (in_array($request['id'], $id)) {
                return redirect::back()->with('danger', 'Paslauga  jau yra įtraukta į Jūsų kuriamą projektą');
            } else {
                Project::create([
                    'client_id' => Auth::user()->id,
                    'fk_service_id' => $request['id'],
                    'fk_freelancer_id' => $request['freelancerId'],
                    'price' => $request['price'],
                    'price_content' => $request['price_content'],
                    'time_id' => $request->get('time_id'),
                    'status' => 0,
                ]);
                Schedule::where('id', $request->get('time_id'))->update(['status' => 1]);
                return redirect::back()->with('success', 'Paslauga įtraukta į Jūsų kuriamą projektą');
            }
    }
    public function orderProject(Request $request)
    {
        $count=Project::where('client_id', Auth::user()->id)->where('status','=','0')->count();
        $this->validate($request,[
        ]);

        if($count>=2){
            Schedule::where('id', $request->get('time_id'))->update(['status' => 1]);
        Project::where('status', 0)->update(['project_name' => $request['project_name']]);
        Project::where('client_id', Auth::user()->id)->update(['status' => 1]);
        return redirect('/orders');
        }
        else {
            return redirect::back()->with('danger', 'Jūsų projektas nėra užbaigtas, jame turi būti bent dvi paslaugos');
        }
    }

    public function show(Project $project)
    {
        $offer = Offers::find($project->fk_service_id);

        return view('project.show', compact('project', 'offer'),
            ['users' => User::All()]);
    }

    public function destroy(Project $project)
    {
        Project::where('id', $project->id)->delete();
        Schedule::where('id', $project->time_id)->update(['status' => 0]);

        return redirect::back()->with('success', 'Paslauga pašalinta iš projekto');
    }
}

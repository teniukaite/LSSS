<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Offers;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ScheduleController
{
    public function index()
    {
        $offers = Offers::where('freelancerId', Auth::user()->id)->get();

                return view('schedule.index',['allOffers'=>$offers,
                    'categories' => Categories::All(),
                    'times'=>Schedule::All()->where('date','>',Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
                        return sprintf('%s%s', $inquiry->date, $inquiry->time);
                    })->values()
                ]);

//            }
//        }

     }
    public function openAddTime($id)
    {

        return view('schedule.addTime', [
            'offerId' => Offers::findOrFail($id),
        ]);

    }
    public function create()
    {
        return view ('schedule.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
//            'time' => 'required|date_format:HH:mm',
        ]);

        $fk_freelancer_id  = Auth::user()->id;
        Schedule::create([
            'fk_freelancer_id'=> $fk_freelancer_id,
            'date'=>$request->get('date'),
            'time'=>$request->get('time'),
            'status'=>$request->status=0,
            'offer_id'=>$request->get('id'),
        ]);
        return redirect ('/schedule/index');
    }
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect('/schedule/index')->with("status", "Registracijos laikas ištrintas sėkmingai!");
    }
//    public function destroy($id)
//    {
//        $schedule = Schedule::find($id);
//        $schedule->delete();
//
//        return redirect('/schedule/index')->with('success', 'Contact deleted!');
//    }


}

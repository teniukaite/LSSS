<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Offers;
use App\Models\Project;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('fk_client_id', Auth::user()->id)->get();
        $projects = Project::where('client_id', Auth::user()->id)->where('status','=','1')->get();
        return view('order.index', compact('orders','projects'),[
        'offers' => Offers::All(),
        'users' => User::All(),
        'orderDates' => Schedule::All()->where('date','>',Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
            return sprintf('%s%s', $inquiry->date, $inquiry->time);
        })->values(),
            'orderCompleted' => Schedule::All()->where('date','<',Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
                return sprintf('%s%s', $inquiry->date, $inquiry->time);
            })->values()]);
    }
    public function create($id)
    {
        $offer = Offers::find($id);
        return view('order.create', compact('offer'));
    }
    public function store(Request $request)
    {
        $order = [
            'fk_client_id' => Auth::user()->id,
            'fk_service_id' => $request['id'],
            'comment' => $request['comment'],
            'order_date'=>$request->get('order_date'),

        ];
        Schedule::where('id', $request->get('order_date'))->update(['status' => 1]);
        Order::create($order);

        return redirect('/orders');
    }
    public function show(Order $order)
    {
        $user=User::where('id',$order->fk_client_id)->get();
        $offer = Offers::find($order->fk_service_id);
        $orders = Order::All();
        $users = User::All();
        $dates= Schedule::All();
        foreach($users as $user){
        if($order->fk_client_id == $user->id){
        foreach($orders as $order){
        foreach($dates as $date){
        if($order->order_date == $date->id && $order->order_date = $date->id){
            $client=$user;
            $orderTime=$date;
        }
      }
    }
  }
}
        return view('order.show', compact('offer','user','order','client','orderTime'),
        ['users' => User::All(),
          'orders' => Order::All(),
          'dates' => Schedule::All()]);
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }
    public function destroy(Order $order)
    {

        Schedule::where('id', $order->order_date)->update(['status' => 0]);
        $order->delete();
        return redirect('/orders');
    }

}

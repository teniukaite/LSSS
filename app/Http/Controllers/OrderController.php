<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Offers;
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

        return view('order.index', compact('orders'),[
        'offers' => Offers::All(),
        'users' => User::All(),
        'orderDates' => Schedule::All()->where('date','>',Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
            return sprintf('%s%s', $inquiry->date, $inquiry->time);
        })->values()]);
    }
    public function create($id)
    {
        /* $order = DB::table('offers')->where(['id'=>$id])->get();
          return view('orders.create', ['orders' => $order]); */

        $offer = Offers::find($id);
        return view('order.create', compact('offer'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[

//            'order_date' => ['required'],
        ]);
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
        $offer = Offers::find($order->fk_service_id);

        return view('order.show', compact('order', 'offer'),
        ['users' => User::All()]);
    }

//    public function create($id)
//    {
//        /* $order = DB::table('offers')->where(['id'=>$id])->get();
//          return view('orders.create', ['orders' => $order]); */
//        $offer = Offers::find($id);
//        return view('order.create',compact('offer'),[
//            'categories' => Categories::All(),
//            'users' => User::All()]);
//    }
//    public function store(Request $request, $offerId)
//    {
//        $fk_service_id = Schedule::find($offerId);
//        Order::create([
//            'order_date'=>$request->get('order_date'),
//            'price'=>$request->get('price'),
//            'comment'=>$request->get('comment'),
//            'fk_client_id' => Auth::user()->id,
//            'fk_freelancer_id '=>$request->get('fk_freelancer_id'),
//            'fk_service_id'=> $fk_service_id,
//
//        ]);
//        Schedule::findOrNew($offerId)->update(['status' => "1"]);
//
//        return redirect ('/orders');
//    }
//    public function store(Request $request)
//    {
//        $order = [
//            'order_date' => date('Y-m-d H:i:s'),
////            'order_price' => $request['price'],
//            'fk_client_id' => Auth::user()->id,
//            'offer_id' => $request['id']
//        ];
//
//        Order::create($order);
//
//        return redirect('/orders');
//    }



//    public function show()
//    {
//       $order= Order::all();
////        $offer = Offers::find($order->offer_id);
//
////        return view('order.show', compact('order', 'offer'));
//
//        $order_id = Order::where('fk_client_id', Auth::user()->id)->get();
//        //        $order = Order::where('fk_user_id', Auth::user()->id)->get();
//        return view('order.show', compact('order'),[
//            'categories' => Categories::All(),
//            'users' => User::All(),
//            'times'=>Schedule::All(),
////            'allFiles'=>File::All()
//        ]);

//        return view('order.show', compact('order'));
//    }
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


//    public function index()
//    {
//        $orders = Order::where('user_id', Auth::user()->id)->get();
//
//        return view('orders.index', compact('orders'));
//    }


}

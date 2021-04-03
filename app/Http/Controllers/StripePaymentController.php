<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {   
        $room=Room::find($request->id);
        return view('stripe',["room"=>$room,
                            "accompanies"=>$request->accompanies,
        ]);
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $data=$request->all();
        $room=Room::where('id',$request->id)->first();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
                "amount" => 100*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment" 
        ]);
        
        Session::flash('success', 'Payment successful!');
        Reservation::create([
                'room_num' =>$room->room_number,
                'accompany_number' => $data['accompanies'],
                'paid_price' => $room->price,
                'room_id' => $room->id,
                'user_id' => Auth::user()->id
        ]);
        
        return back();
    }
}
<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $data=$request->all();
        $room=Room::find($data['room_id']);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $room->price/100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
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
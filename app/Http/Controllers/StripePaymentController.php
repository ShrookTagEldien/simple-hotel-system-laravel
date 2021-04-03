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
    public function stripe($id)
    {   
       
        $room=Room::find($id);
        return view('stripe',["room"=>$room]);
        
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
                "amount" => (int)$room->price,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment" 
        ]);
        
        Session::flash('success', 'Payment successful!');
        Reservation::create([
                'room_num' =>$room->room_number,
                'accompany_number' => $request->accompanies,
                'paid_price' => $room->price,
                'room_id' => $room->id,
                'user_id' => Auth::user()->id
        ]);
        
        return back();
    }
}
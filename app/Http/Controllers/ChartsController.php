<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Receptionist;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\PendingClientsDataTable;
use App\DataTables\MyClientsDataTable;



class ChartsController extends Controller
{
    public function showGenderReservationsChart()
    {
       
        $MaleClients = User::join('Reservations', 'Reservations.user_id', '=', 'Users.id')
            ->where('Users.gender' ,'male')
            ->count();

        $FemaleClients = User::join('Reservations', 'Reservations.user_id', '=', 'Users.id')
            ->where('Users.gender' ,'female')
            ->count();

        return view('genderReservationsChart', [
                'MaleClients' => $MaleClients,
                'FemaleClients' => $FemaleClients,
            ]);
        
    }

    public function showReservationsRevenueChart()
    {
       
        $January = Reservation::whereMonth('date', '01')
                                ->sum('paid_price');
        $February = Reservation::whereMonth('date', '02')
                                ->sum('paid_price');
        $March = Reservation::whereMonth('date', '03')
                                ->sum('paid_price');
        $April  = Reservation::whereMonth('date', '04')
                                ->sum('paid_price');
        $May = Reservation::whereMonth('date', '05')
                                ->sum('paid_price');
        $June  = Reservation::whereMonth('date', '06')
                                ->sum('paid_price');
        $July = Reservation::whereMonth('date', '07')
                                ->sum('paid_price');
        $August = Reservation::whereMonth('date', '08')
                                ->sum('paid_price');
        $September = Reservation::whereMonth('date', '09')
                                ->sum('paid_price');
        $October = Reservation::whereMonth('date', '10')
                                ->sum('paid_price');
        $November = Reservation::whereMonth('date', '11')
                                ->sum('paid_price');
        $December  = Reservation::whereMonth('date', '12')
                                ->sum('paid_price');
        
        
        
        
                                
        return view('reservationsRevenueChart', [
                
                'January' => $January,
                'February' => $February,
                'March' => $March,
                'April' => $April,
                'May' => $May,
                'June' => $December ,
                'July' => $July,
                'August' => $August,
                'September' => $September ,
                'October' => $October,
                'November' => $November,
                'December' => $December ,
                
            ]);
        
    }
}

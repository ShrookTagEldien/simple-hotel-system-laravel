<?php
namespace App;
use App\Models\Room;

use App\Models\Floor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminFloorController;
use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\AdminReceptionsController;

Auth::routes();


Route::group(['middleware' => ['role:manager']], function () {
      Route::get('/manager_dashboard', function(){
        return view('manager.dashboard',[ 'availableRooms'=> Room::where('status','available')->count(),
                                            'rooms'=> Room::where('status','rented')->count(),
                                            'available'=> intval(Room::avg('price')),
                                            'reservations'=>'4037',
                                            'floors'=>Floor::count(),
                                            'clients'=>'9520'

                                            ]);
      })->name('manag_dashboard');
    
      //we're using admin prefix for all those routes defined in routeServiceProvider.php for admin accout as following >> localhost:8000/admin/following_route_name
      Route::get('/', [managerController::class, 'dash'])->name('dash');
      Route::get('/receptionist', [managerController::class, 'recep'])->name('rec');
      Route::get('/rooms', [managerController::class, 'rooms'])->name('rooms');
      Route::get('/floors', [managerController::class, 'floors'])->name('floors');
      Route::get('/clients', [managerController::class, 'clients'])->name('clients');

      /********** Tables listing data routes*************/
      //Route::get('get-rooms', [managerController::class, 'getRooms'])->name('rooms.list');
      //Route::get('/Receptionists', [managerController::class, 'getManagerReceptionists'])->name('managerReceptionist.list');

      /*******CRUD operations routes ******/


      Route::get('/receptionists', [adminController::class, 'getReceptionists'])->name('receptionist.manager.list');
      Route::get('get-rooms', [adminController::class, 'getRooms'])->name('rooms.list.manager');
      Route::resource('managerRooms', AdminRoomController::class);


      Route::resource('adminReceptions', AdminReceptionsController::class);
      //Route::resource('adminFloors', AdminReceptionsController::class);
      Route::resource('adminFloors', AdminFloorController::class);
      Route::resource('adminRooms', AdminRoomController::class);



//Route::resource('adminFloors', managerFloorController::class);
}); 
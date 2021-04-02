<?php

namespace App\Observers;

use App\Models\Manager;
use App\Models\User;


class ManagerObserver
{
    /**
     * Handle the Manager "created" event.
     *
     * @param  \App\Models\Manager  $manager
     * @return void
     */
    public function created(Manager $data)
    {
        //dd("created Manager");
        //$manager->assignRole('manager');
       
  /*      
        User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar'=>'img.png',
            'country'=>'Egypt',
            'gender'=>'Male',
            'phone'=>$data['phone'],
            
        ]); 
*/

    }

    /**
     * Handle the Manager "updated" event.
     *
     * @param  \App\Models\Manager  $manager
     * @return void
     */
    public function updated(Manager $manager)
    {
        //
    }

    /**
     * Handle the Manager "deleted" event.
     *
     * @param  \App\Models\Manager  $manager
     * @return void
     */
    public function deleted(Manager $manager)
    {
        //
    }

    /**
     * Handle the Manager "restored" event.
     *
     * @param  \App\Models\Manager  $manager
     * @return void
     */
    public function restored(Manager $manager)
    {
        //
    }

    /**
     * Handle the Manager "force deleted" event.
     *
     * @param  \App\Models\Manager  $manager
     * @return void
     */
    public function forceDeleted(Manager $manager)
    {
        //
    }
}

<?php

use Illuminate\Foundation\Inspiring;
use App\User;
use App\Notifications\InspireUser;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
  $users = User::all();
  $users->each(function($item, $key){
    $this->info("Notifying {$item->name}");
    $item->notify(new InspireUser(Inspiring::quote()));
  });
})->describe('Send an in inspiring quote to all your users');

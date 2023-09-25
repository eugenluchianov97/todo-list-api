<?php

namespace App\Console\Commands;

use App\Mail\TaskMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DemoCron extends Command
{
    protected $signature = 'demo:cron';

    protected $description = 'Command description';

    public function __construct()

    {

        parent::__construct();

    }


    public function handle()

    {

        \Log::info("Cron is working fine!");
        //Mail::to('eugenluchianov97@gmail.com')->send(new TaskMail([]));


        /*

           Схема вашей базы данных

           Item::create(['name'=>'hello new']);

        */

    }
}

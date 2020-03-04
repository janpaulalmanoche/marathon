<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\EventCategoryDistanceFeeParticipant;
use Carbon\Carbon;

class CancelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $get = EventCategoryDistanceFeeParticipant::get();

        foreach($get as $g){
            if($g->created_at->diffInDays(Carbon::now()) >= 2){
                $g->status = 'canceled';
                $g->update();
            }
        }


    }
}

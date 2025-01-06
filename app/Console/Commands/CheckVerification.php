<?php

namespace App\Console\Commands;

use App\Models\CheckMail;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckVerification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time = Carbon::now()->subSeconds(60);

        CheckMail::where('created_at', '<', $time)->delete();
    }
}

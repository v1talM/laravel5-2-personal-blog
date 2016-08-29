<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class VisitTotal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visit:total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'count the visitors of website per month';

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

    }
}

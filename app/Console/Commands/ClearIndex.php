<?php
namespace App\Console\Commands;

use AlgoliaSearch\Client;
use Illuminate\Console\Command;

class ClearIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scout:clear {model}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all data in search index, regardless of database';
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $class = $this->argument('model');
        $model = new $class;
        $this->info('Index ' . $model->searchableAs() . ' cleared');
    }
}

<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class AppInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Этот процесс установит все зависимости, структуру базы данных и бэкенд приложения.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $progressBar = $this->output->createProgressBar(100);
        $progressBar->setMessage('Install...');
        $progressBar->start();
        try {
            Artisan::call('storage:link');
            $progressBar->advance(10);

            Artisan::call('key:generate');
            $progressBar->advance(10);

            Artisan::call('migrate:fresh');
            $progressBar->setMessage('Tables created successfully.');
            $progressBar->advance(40);

            Artisan::call('db:seed');
            $progressBar->advance(10);

            Artisan::call('optimize:clear');
            $progressBar->advance(5);

            Artisan::call('l5-swagger:generate');
            $progressBar->advance(15);

            $progressBar->setMessage('Application installation completed successfully.');
            $progressBar->finish();

            return 0;
        } catch (Exception $e) {
            $this->error("Application installation failed with error code: {$e->getCode()}, reason: {$e->getMessage()}");
            Log::error('Application installation failed', [$e]);
        }

        return 1;
    }
}


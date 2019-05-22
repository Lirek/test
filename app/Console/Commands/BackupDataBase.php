<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackupDataBase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->process = new Process(sprintf(
          'mysqldump -u%s -p%s %s > %s',
          config('database.connections.mysql.username'),
          config('database.connections.mysql.password'),
          config('database.connections.mysql.database'),
          storage_path('storage/db/backup.sql')
      ));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      try {
          $this->process->mustRun();

          $this->info('The backup has been proceed successfully.');
      } catch (ProcessFailedException $exception) {
          $this->error($exception);
      }
    }
}

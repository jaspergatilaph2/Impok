<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SetOfflineUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-offline-users';

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
        $threshold = now()->subMinutes(5);

        User::where('status', 'active')
            ->where('role', 'user')
            ->where('last_seen', '<', $threshold)
            ->update([
                'status' => 'inactive'
            ]);

        $this->info('Offline users updated successfully.');
    }
}

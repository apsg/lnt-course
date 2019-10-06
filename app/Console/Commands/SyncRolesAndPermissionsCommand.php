<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class SyncRolesAndPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync roles and permissions';

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
        foreach (config('roles') as $name => $permissions) {
            $role = Role::firstOrCreate([
                'name' => $name,
            ]);

            foreach ($permissions as $permission) {
                $role->permissions()->firstOrCreate([
                    'name' => $permission
                ]);
            }
        }

        $this->info('Done');
    }
}

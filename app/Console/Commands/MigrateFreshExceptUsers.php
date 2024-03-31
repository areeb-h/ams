<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrateFreshExceptUsers extends Command
{
    protected $signature = 'migrate:except-users';
    protected $description = 'Drop all tables except specified ones and run migrations';

    public function handle()
    {
        $keepTables = ['users', 'password_resets']; // Add any other tables you wish to keep.
        $allTables = [];

        // Fetch all table names
        foreach (DB::select('SHOW TABLES') as $table) {
            // The table name attribute depends on the database default settings, it usually follows the pattern 'Tables_in_yourdbname'
            $tableName = $table->{'Tables_in_'.env('DB_DATABASE')};
            if (!in_array($tableName, $keepTables)) {
                $allTables[] = $tableName;
            }
        }

        if (empty($allTables)) {
            $this->info('No tables to drop.');
            return;
        }

        // Disable foreign key checks to prevent issues with dropping tables that have foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($allTables as $tableName) {
            // Drop tables dynamically
            Schema::dropIfExists($tableName);
            $this->info("Dropped: {$tableName}");
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Run migrations
        $this->call('migrate');
    }
}

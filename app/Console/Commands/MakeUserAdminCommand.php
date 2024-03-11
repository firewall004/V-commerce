<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class MakeUserAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:admin {user_id} {value=true}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a user an admin or revert admin status';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userId = $this->argument('user_id');
        $value = filter_var($this->argument('value'), FILTER_VALIDATE_BOOLEAN);

        $user = User::find($userId);

        if (!$user) {
            $this->error('User not found.');
            return;
        }

        $user->is_admin = $value;
        $user->save();

        $status = $value ? 'made admin' : 'reverted to regular user';
        $this->info("User '{$user->name}' (ID: {$user->id}) has been $status.");
    }
}

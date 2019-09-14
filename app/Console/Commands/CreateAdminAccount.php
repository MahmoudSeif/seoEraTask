<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateAdminAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user account with admin flag.';

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
        $admin = [
            'name' => 'Mahmoud Seif',
            'email' => 'mahmoudseif893@hotmail.com',
            'password' => bcrypt('123456'),
            'phone' => '01124614208',
            'language_id' => 1,
            'isAdmin' => 1
        ];
        $checkAdmin = User::where('email','mahmoudseif893@hotmail.com')->count();
        if ($checkAdmin > 0)
            echo 'Admin Already Created for You with email "mahmoudseif893@hotmail.com" and password "123456".';
        else
        {
            $user = User::create($admin);
            if($user) {
                echo 'Admin Created "mahmoudseif893@hotmail.com" and password "123456" is successfully created.';
            }
        }
    }
}

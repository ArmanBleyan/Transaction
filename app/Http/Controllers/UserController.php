<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function test()
    {
            DB::transaction(function() {
 
                Post::create([
                    'title' => 'Post 10',
                    'description' => 'Laravel post',
                    'is_publish' => 0,
                ]);

                User::create([
                    'name' => 'john',
                    'email' => 'testing@mail.ru',
                    'password' => 1234,
                ]);

            });

        return 'success';
       
    }

    public function delete()
    {
        $user = User::withTrashed()->find(1);
        $user->restore();
        dd('delete');
    }

}
<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;

class HomeController extends Controller {

    protected $user;

    public function __construct()
    {
        $this->user = $this->model('User');
    }

    public function index(...$arg) {

        $users = User::all();

        $this->view('home.index', ['users' => $users]);
    }

    public function create(...$arg){

        $bcrypt = new BcryptHasher();
        $newUser = $this->user->create([
            'name' => $arg[0],
            'email' => $arg[1],
            'password' => $bcrypt->make('123456'),
            'api_token' => str_random(60)
        ]);
    }

}

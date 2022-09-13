<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'name' => 'L\'équipe',
            'teams' => [['name' => 'Pierre', 'job' => 'DG'], ['name' => 'Paul', 'job' => 'RH'], ['name' => 'Jacques', 'job' => 'développeur'], ['name' => 'Marie', 'job' => 'comptable']],
        ]);
    }

    public function user($user)
    {
        return view('user', [
            'user' => ucfirst($user),
        ]);
    }
}

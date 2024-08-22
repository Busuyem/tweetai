<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autobot;

class AutobotController extends Controller
{
    public function index()
    {
        return Autobot::paginate(10);
    }

    public function show(Autobot $autobot)
    {
        return $autobot;
    }

    public function posts(Autobot $autobot)
    {
        return $autobot->posts()->paginate(10);
    }
}

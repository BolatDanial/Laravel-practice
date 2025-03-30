<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class ForumController extends Controller
{
    public function index() {
        return view('forum', ['topics' => Topic::all()]);
    }
}

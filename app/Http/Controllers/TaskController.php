<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $khs = Task::query()->with('kelas')->get();
        return view('administrator.khs.index', [
            'khs' => $khs
        ]);
    }
}

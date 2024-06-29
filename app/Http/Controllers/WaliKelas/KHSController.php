<?php

namespace App\Http\Controllers\WaliKelas;

use App\Models\Task;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KHSController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::query()->with('tasks')->where('id', $request->kelas)->firstOrFail();
        return view('walikelas.khs.index', [
            'kelas' => $kelas
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => ['exists:App\Models\Kelas,id'],
            'name' => ['required', 'string'],
            'nilai' => ['required', 'numeric'],
        ]);

        Task::create([
            'name' => $request->name,
            'kelas_id' => $request->kelas_id,
            'nilai' => $request->nilai,
            'created_by' => auth()->user()->id
        ]);

        flash()->addSuccess('Data Kegiatan Tersimpan');
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kelas_id' => ['exists:App\Models\Kelas,id'],
            'name' => ['required', 'string'],
            'nilai' => ['required', 'numeric'],
        ]);
        $task = Task::where('id', $id)->first();
        $task->update([
            'name' => $request->name,
            'kelas_id' => $request->kelas_id,
            'nilai' => $request->nilai,
            'created_by' => auth()->user()->id
        ]);

        flash()->addSuccess('Data Kegiatan Berhasil Diubah');
        return redirect()->route('task.index', ['kelas' => $task->kelas_id]);
    }
}

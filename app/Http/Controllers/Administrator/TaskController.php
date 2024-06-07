<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Kelas;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $khs = Task::query()->with('kelas')->get();
        $class = Kelas::get();
        return view('administrator.khs.index', [
            'khs' => $khs,
            'class' => $class
        ]);
    }
    public function khsKelas(string $kelas)
    {
        $kelas = Kelas::query()->with('tasks')->where('id', $kelas)->first();


        return view('administrator.khs.khsKelas', [
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
            'nilai' => $request->nilai
        ]);

        flash()->addSuccess('Data Kegiatan Tersimpan');
        return redirect()->route('khs.index');
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
            'nilai' => $request->nilai
        ]);

        flash()->addSuccess('Data Kegiatan Berhasil Diubah');
        return redirect()->route('khs.index');
    }

    public function destroy(string $id)
    {
        try {
            // Cari data WaliKelas berdasarkan slug
            $task = Task::where('id', $id)->firstOrFail();

            // Hapus data WaliKelas dari database
            $task->delete();
            return response()->json(['success' => 'Item deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'There was an error deleting the item'], 500);
        }
    }
}

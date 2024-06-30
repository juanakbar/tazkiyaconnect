<?php

namespace App\Http\Controllers\WaliKelas;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswas = Kelas::query()->with('siswas')->where('slug', $request->kelas)->firstOrFail();
        // ddd($siswas);
        return view('waliKelas.siswa.index', [
            'siswas' => $siswas
        ]);
    }

    public function show($siswa, Request $request)
    {
        $siswa = Siswa::query()->with('waliMurid')->where('id', $siswa)->firstOrFail();
        $created_at = $request->input('created_at', Carbon::today()->toDateString());

        // Query dengan tanggal yang didapat
        $penilaians = Penilaian::query()
            ->with('siswa', 'task')
            ->where('siswa_id', $siswa->id)
            ->whereDate('created_at', $created_at)
            ->get();
        return view('walikelas.siswa.khssiwa', [
            'siswa' => $siswa,
            'penilaians' => $penilaians
        ]);
    }

    public function penilaian(string $siswa, Request $request)
    {
        $siswa = Siswa::query()->where('id', $siswa)->firstOrFail();
        $tasks = Task::query()->where('kelas_id', $siswa->kelas_id)->get();
        return view('walikelas.siswa.penilaian', [
            'siswa' => $siswa,
            'tasks' => $tasks
        ]);
    }
    public function updatePenilaian(string $siswa, Request $request)
    {
        $created_at = $request->input('created_at', Carbon::today()->toDateString());
        $siswa = Siswa::query()->where('id', $siswa)->firstOrFail();
        $tasks = Penilaian::query()->with('task')->where('siswa_id', $siswa->id)->whereDate('created_at', $created_at)->get();
        // dd($tasks->task->name);
        return view('walikelas.siswa.update-penilaian', [
            'siswa' => $siswa,
            'tasks' => $tasks
        ]);
    }

    public function penilaian_post(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'task_id' => 'required|array',
            'task_id.*' => 'exists:tasks,id',
            'siswa_id' => 'required|exists:siswas,id',
            'created_at' => 'required|date',
            'nilai' => 'required|array',
            'nilai.*' => 'string',
        ]);

        try {
            // Loop through the tasks and save the evaluations
            foreach ($validatedData['task_id'] as $index => $taskId) {
                Penilaian::create([
                    'task_id' => $taskId,
                    'siswa_id' => $validatedData['siswa_id'],
                    'created_at' => Carbon::parse($validatedData['created_at']),
                    'nilai' => $validatedData['nilai'][$index],
                ]);
            }

            // Set flash message
            flash()->addSuccess('Penilaian Siswa Berhasil Ditambahkan');

            // Redirect with success message and parameters
            return redirect()->route('murid-anda.show', [
                'murid_anda' => $request->siswa_id,
                'created_at' => Carbon::parse($validatedData['created_at'])->toDateString(),
            ]);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangani di sini (misalnya log error)
            Log::error('Error saat menyimpan penilaian: ' . $e->getMessage());
            flash()->addError('Terjadi kesalahan saat menyimpan penilaian.');
            return back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }
    public function penilaian_put(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'task_id' => 'required|array',
            'task_id.*' => 'exists:tasks,id',
            'siswa_id' => 'required|exists:siswas,id',
            'created_at' => 'required|date',
            'nilai' => 'required|array',
            'nilai.*' => 'numeric|min:0|max:10',
        ]);

        try {
            // Loop through the tasks and update the evaluations
            foreach ($validatedData['task_id'] as $index => $taskId) {
                $penilaian = Penilaian::where('task_id', $taskId)
                    ->where('siswa_id', $validatedData['siswa_id'])
                    ->whereDate('created_at', Carbon::parse($validatedData['created_at'])->toDateString())
                    ->firstOrFail(); // Ambil atau buat baru jika tidak ada

                $penilaian->update([
                    'nilai' => $validatedData['nilai'][$index],
                ]);
            }

            // Set flash message
            flash()->addSuccess('Penilaian Siswa Berhasil Diupdate');

            // Redirect with success message and parameters
            return redirect()->route('murid-anda.show', [
                'murid_anda' => $request->siswa_id,
                'created_at' => Carbon::parse($validatedData['created_at'])->toDateString(),
            ]);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangani di sini (misalnya log error)
            Log::error('Error saat mengupdate penilaian: ' . $e->getMessage());
            flash()->addError('Terjadi kesalahan saat mengupdate penilaian.');
            return back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }

}

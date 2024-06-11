<x-app-layout>
    <div class="panel my-8 w-full max-w-sm overflow-hidden rounded-lg border-0 py-1 px-4">
        <div class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
            Tambah Siswa Untuk {{ $waliMurid->user->name }}

        </div>
        <div class="p-5">
            <form action="{{ route("kelas.store") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="grade">Kelas</label>
                    <input id="grade" type="number" placeholder="Masukkan Kelas" class="form-input" name="grade"
                        value="{{ old("grade") }}" />
                    @error("grade")
                        <p class="text-danger mt-1">Mohon dicek Kembali</p>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="level">Level</label>
                    <input id="level" type="number" placeholder="Masukkan Level" class="form-input" name="level"
                        value="{{ old("level") }}" />
                    @error("level")
                        <p class="text-danger mt-1">Mohon dicek Kembali</p>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary w-full">Simpan</button>
            </form>
        </div>

    </div>

</x-app-layout>

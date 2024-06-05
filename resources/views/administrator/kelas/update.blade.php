<x-app-layout>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="panel ">
            <div class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                Tambah Kelas

            </div>
            <div class="p-5">
                <form action="{{ route("kelas.update", $item->slug) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="mb-3">
                        <label for="grade">Kelas</label>
                        <input id="grade" type="number" placeholder="Masukkan Kelas" class="form-input"
                            name="grade" value="{{ old("grade", $item->grade) }}" />
                        @error("grade")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="level">Level</label>
                        <input id="level" type="number" placeholder="Masukkan Level" class="form-input"
                            name="level" value="{{ old("level", $item->level) }}" />
                        @error("level")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary w-full">Simpan</button>
                </form>
            </div>

        </div>
        {{-- @if ($item->waliKelas)
            <div class="panel">
                <div class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                    Pilih Wali Kelas Untuk Kelas {{ $item->grade }} Level {{ $item->level }}

                </div>
                <div class="p-5">
                    <form action="{{ route("assign_wali_kelas", $item->slug) }}" method="POST">
                        @csrf
                        <select name="wali_kelas_id" id="wali_kelas_id" class="selectize mb-3">
                            @foreach ($waliKelas as $wali)
                                <option value="{{ $wali->id }}"
                                    {{ $wali->id === $item->wali_kelas_id ? "selected" : "" }}>
                                    {{ $wali->user->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-full">Login</button>
                    </form>
                </div>
            </div>
        @endif --}}
    </div>
    @push("CSS")
        <link rel='stylesheet' type='text/css' href='{{ Vite::asset("resources/css/nice-select2.css") }}'>
    @endpush
    @push("JS")
        <script src="/assets/js/nice-select2.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(e) {
                // seachable 
                var options = {
                    searchable: true,
                    placeholder: 'Pilih Wali Kelas'
                };
                NiceSelect.bind(document.getElementById("wali_kelas_id"), options);
            });
        </script>
    @endpush
</x-app-layout>

<x-app-layout>

    <form class="space-y-5" action="{{ route("siswa.store") }}" method="POST" enctype="multipart/form-data">
        @method("POST")
        @csrf
        <div class="mb-6 grid gap-6 xl:grid-cols-3">
            <div class="panel h-full xl:col-span-2">
                <div class="mb-5 flex items-center">
                    <h5 class="text-lg font-semibold dark:text-white-light">Tambah Siswa</h5>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name">Nama Siswa</label>
                        <input id="name" type="name" placeholder="Masukkan Nama Siswa" class="form-input"
                            name="name" />
                        @error("name")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror

                    </div>
                    <div>
                        <label for="nisn">NISN Siswa</label>
                        <input id="nisn" type="number" placeholder="Masukkan nisn Siswa" class="form-input"
                            name="nisn" />
                        @error("nisn")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nis">NIS Siswa</label>
                        <input id="nis" type="number" placeholder="Masukkan Nik Siswa" class="form-input"
                            name="nis" />
                        @error("nis")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="jenis_kelamin">Jenis Kelamin Siswa</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                            <option value="" selected disabled>Pilih Jenis Kelamin Siswa...</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error("jenis_kelamin")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tempat_lahir">Tempat Lahir Siswa</label>
                        <input id="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir Siswa"
                            class="form-input" name="tempat_lahir" />
                        @error("tempat_lahir")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal_lahir">Tanggal Lahir Siswa</label>
                        <input id="tanggal_lahir" x-model="currentDate" class="form-input" name="tanggal_lahir" />
                        @error("tanggal_lahir")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="wali_murid_id">Orang Tua</label>
                        <select id="wali_murid_id" name="wali_murid_id" class="form-select">
                            <option value="" selected disabled>Pilih Orang Tua Siswa...</option>
                            @foreach ($walimurids as $walimurid)
                                <option value="{{ $walimurid->user->id }}">{{ $walimurid->user->name }}</option>
                            @endforeach
                        </select>
                        @error("wali_murid_id")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="kelas_id">Kelas</label>
                        <select id="kelas_id" name="kelas_id" class="form-select">
                            <option value="" selected disabled>Pilih Kelas Siswa...</option>
                            @foreach ($kelas as $kelass)
                                <option value="{{ $kelass->id }}">Kelas {{ $kelass->grade }} - Level
                                    {{ $kelass->level }}</option>
                            @endforeach
                        </select>
                        @error("kelas_id")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                            <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                                src="{{ asset("assets/images/file-preview.svg") }}" alt="Current profile photo" />
                        </div>
                        <label class="block">
                            <label>Profile Picture Siswa</label>
                            <input type="file" onchange="loadFile(event)" id="avatar" name="avatar"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 " />
                            @error("avatar")
                                {{ $errors->first("avatar") }}
                            @enderror
                        </label>
                    </div>

                </div>
                <div class="flex items-end justify-end">
                    <button type="submit" class="btn btn-primary !mt-6">Simpan</button>
                </div>
            </div>

        </div>
    </form>
    @push("CSS")
        <link rel="stylesheet" href="{{ Vite::asset("resources/css/flatpickr.min.css") }}">
        <link rel='stylesheet' type='text/css' href='{{ Vite::asset("resources/css/nice-select2.css") }}'>
    @endpush
    @push("JS")
        <script src="/assets/js/nice-select2.js"></script>
        <script src="{{ asset("assets/js/flatpickr.js") }}"></script>
        <script>
            var loadFile = function(event) {

                var input = event.target;
                var file = input.files[0];
                var type = file.type;

                var output = document.getElementById('preview_img');


                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
            const date = new Date();
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let currentDate = `${year}-0${month}-${day}`;
            flatpickr("#tanggal_lahir", {

            });

            var options = {
                searchable: true,
                placeholder: 'Pilih Kelas'
            };
            NiceSelect.bind(document.getElementById("kelas_id"), options);
            NiceSelect.bind(document.getElementById("wali_murid_id"), options);
        </script>
    @endpush
</x-app-layout>

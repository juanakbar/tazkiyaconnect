<x-app-layout>

    <form class="space-y-5" action="{{ route("walikelas.store") }}" method="POST" enctype="multipart/form-data">
        @method("POST")
        @csrf

        <div class="mb-6 grid gap-6 xl:grid-cols-3">


            <div class="panel h-full xl:col-span-2">

                <div class="mb-5 flex items-center">
                    <h5 class="text-lg font-semibold dark:text-white-light">Info Detail Wali Murid</h5>

                </div>

                <div class="mb-3 p-3.5  text-info bg-info-light rounded-xl">
                    <p>Informasi Login : </p>
                    <p>Email : Gunakan Email yang didaftarkan Wali Murid </p>
                    <p>password : password </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name">Nama Wali Kelas</label>
                        <input id="name" type="name" placeholder="Masukkan Nama Wali Kelas" class="form-input"
                            name="name" />
                        @error("name")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror

                    </div>
                    <div>
                        <label for="email">Email Wali Kelas</label>
                        <input id="email" type="email" placeholder="Masukkan Email Wali Kelas" class="form-input"
                            name="email" />
                        @error("email")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nip">Nomor Induk Pekerja Wali Kelas</label>
                        <input id="nip" type="number" placeholder="Masukkan Nik Wali Kelas" class="form-input"
                            name="nip" />
                        @error("nip")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="jenis_kelamin">Jenis Kelamin Wali Kelas</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                            <option value="" selected disabled>Pilih Agama Wali Kelas...</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error("jenis_kelamin")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tingkat_pendidikan">Tingkat Pendidikan Wali Kelas</label>
                        <input id="tingkat_pendidikan" type="text"
                            placeholder="Masukkan Tingkat Pendidikan Wali Kelas" class="form-input"
                            name="tingkat_pendidikan" />
                        @error("tingkat_pendidikan")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div class="col-span-full">
                        <label for="alamat">Alamat Wali Kelas</label>
                        <input id="alamat" type="text" placeholder="Masukkan Alamat Wali Kelas" class="form-input"
                            name="alamat" />
                        @error("alamat")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                            <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                                src="{{ asset("assets/images/file-preview.svg") }}" alt="Current profile photo" />
                        </div>
                        <label class="block">
                            <label>Profile Picture Wali Kelas</label>
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
    @push("JS")
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
        </script>
    @endpush
</x-app-layout>

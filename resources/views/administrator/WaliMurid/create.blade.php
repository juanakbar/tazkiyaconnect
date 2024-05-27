<x-app-layout>

    <form class="space-y-5" action="{{ route("walimurid.store") }}" method="POST" enctype="multipart/form-data">
        @method("POST")
        @csrf

        <div class="mb-6 grid gap-6 xl:grid-cols-3" x-data="form">


            <div class="panel h-full xl:col-span-2">

                <div class="mb-5 flex items-center">
                    <h5 class="text-lg font-semibold dark:text-white-light">Info Detail Wali Murid</h5>

                </div>

                <div class="mb-3 p-3.5  text-info bg-info-light rounded-xl">
                    <p>Informasi Login : </p>
                    <p>Email : Gunakan Email yang didaftarkan Wali Murid </p>
                    <p>password : nama orang tua (huruf kecil semua tanpa spasi) </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name">Nama Orang Tua</label>
                        <input id="name" type="name" placeholder="Masukkan Nama Orang Tua" class="form-input"
                            name="name" />
                        @error("name")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror

                    </div>
                    <div>
                        <label for="email">Email Orang Tua</label>
                        <input id="email" type="email" placeholder="Masukkan Email Orang Tua" class="form-input"
                            name="email" />
                        @error("email")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nik">Nomor Induk Kependudukan Orang Tua</label>
                        <input id="nik" type="number" placeholder="Masukkan Nik Orang Tua" class="form-input"
                            name="nik" />
                        @error("nik")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="agama">Agama Orang Tua</label>
                        <select id="agama" name="agama" class="form-select">
                            <option value="" selected disabled>Pilih Agama Orang Tua...</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="budha">Budha</option>
                            <option value="hindu">Hindu</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                        @error("agama")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tempat_lahir">Tempat Lahir Orang Tua</label>
                        <input id="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir Orang Tua"
                            class="form-input" name="tempat_lahir" />
                        @error("tempat_lahir")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tempat_lahir">Tanggal Lahir Orang Tua</label>
                        <input id="basic" x-model="currentDate" class="form-input" name="tanggal_lahir" />
                        @error("tanggal_lahir")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="pendidikan">Pendidikan Orang Tua</label>
                        <input id="pendidikan" type="text" placeholder="Masukkan Pendidikan Orang Tua"
                            class="form-input" name="pendidikan" />
                        @error("pendidikan")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="pekerjaan">Pekerjaan Orang Tua</label>
                        <input id="pekerjaan" type="text" placeholder="Masukkan Pekerjaan Orang Tua"
                            class="form-input" name="pekerjaan" />
                        @error("pekerjaan")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div>
                        <label for="kewarganeraan">Kewarganegaraan Orang Tua</label>
                        <input id="kewarganeraan" type="text" placeholder="Masukkan Kewarganegaraan Orang Tua"
                            class="form-input" name="kewarganeraan" />
                        @error("kewarganeraan")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror

                    </div>
                    <div class="col-span-full">
                        <label for="alamat">Alamat Orang Tua</label>
                        <input id="alamat" type="text" placeholder="Masukkan Alamat Orang Tua" class="form-input"
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
                            <label>Profile Picture Orang Tua</label>
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
        <link rel='stylesheet' type='text/css' href='{{ Vite::asset("resources/css/nice-select2.css") }}'>
        <link rel="stylesheet" href="{{ Vite::asset("resources/css/flatpickr.min.css") }}">
    @endpush
    @push("JS")
        <script src="{{ asset("assets/js/nice-select2.js") }}"></script>
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
        </script>
        <script>
            const date = new Date();
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let currentDate = `${year}-0${month}-${day}`;
            document.addEventListener('alpine:init', () => {

                Alpine.data("form", () => ({

                    init() {
                        this.initDatePicker();

                        this.$watch('$store.app.rtlClass', () => {
                            this.initDatePicker();
                        });
                    },

                    initDatePicker() {
                        // basic
                        flatpickr(document.getElementById('basic'), {
                            dateFormat: 'Y-m-d',
                            defaultDate: currentDate,
                            position: this.$store.app.rtlClass === 'rtl' ? 'auto right' :
                                'auto left'
                        })

                    },

                }));
            });
        </script>
    @endpush
</x-app-layout>

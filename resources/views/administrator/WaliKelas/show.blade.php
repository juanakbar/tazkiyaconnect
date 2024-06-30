<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
        <div class="col-span-8">
            <form method="POST" enctype="multipart/form-data" x-data='form'
                class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726] "
                action="{{ route("walikelas.update", $walikelas->slug) }}">
                @csrf
                @method("PUT")
                <h6 class="mb-5 text-lg font-bold">Informasi Wali Kelas</h6>
                <div class="flex flex-col sm:flex-row">

                    <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name">Nama Wali Kelas</label>
                            <input id="name" type="name" placeholder="Masukkan Nama Wali Kelas"
                                class="form-input" name="name" value="{{ old("name", $walikelas->user->name) }}" />
                            @error("name")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror

                        </div>
                        <div>
                            <label for="email">Email Wali Kelas</label>
                            <input id="email" type="email" placeholder="Masukkan Email Orang Tua"
                                class="form-input" name="email" value="{{ old("email", $walikelas->user->email) }}" />
                            @error("email")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="nip">Nomor Induk Kependudukan Orang Tua</label>
                            <input id="nip" type="number" placeholder="Masukkan Nik Orang Tua" class="form-input"
                                name="nip" value="{{ old("nip", $walikelas->nip) }}" />
                            @error("nip")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="jenis_kelamin">Agama Orang Tua</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option value="" selected disabled>Pilih Agama Orang Tua...</option>
                                <option {{ $walikelas->jenis_kelamin == "P" ? "selected" : "" }} value="P">
                                    Perempuan
                                </option>
                                <option {{ $walikelas->jenis_kelamin == "L" ? "selected" : "" }} value="L">
                                    Laki-Laki
                                </option>

                            </select>
                            @error("jenis_kelamin")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tingkat_pendidikan">Tingkat Pendidikan Wali Kelas</label>
                            <input id="tingkat_pendidikan" type="text"
                                placeholder="Masukkan Tingkat Pendidikan Orang Tua" class="form-input"
                                name="tingkat_pendidikan"
                                value="{{ old("tingkat_pendidikan", $walikelas->tingkat_pendidikan) }}" />

                            @error("tingkat_pendidikan")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div class="col-span-full">
                            <label for="alamat">Alamat Wali Kelas</label>
                            <input id="alamat" type="text" placeholder="Masukkan Alamat Wali Kelas"
                                class="form-input" name="alamat" value="{{ old("alamat", $walikelas->alamat) }}" />
                            @error("alamat")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                                    src="{{ asset("storage/" . $walikelas->user->avatar) }}"
                                    alt="Current profile photo" />
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

                        <div class="mt-3 sm:col-span-2">
                            <p>{{ $walikelas->tanggal_lahir }}</p>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    @push("CSS")
        <link rel="stylesheet" href="{{ Vite::asset("resources/css/flatpickr.min.css") }}">
    @endpush
    @push("JS")
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
            const date1 = {{ $walikelas->tanggal_lahir }};
            console.log(date1);
            document.addEventListener('alpine:init', () => {
                console.log({!! $walikelas->tanggal_lahir !!});
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
                            defaultDate: this.date1,
                            position: this.$store.app.rtlClass === 'rtl' ? 'auto right' :
                                'auto left'
                        })

                    },

                }));
            });
        </script>
    @endpush
</x-app-layout>

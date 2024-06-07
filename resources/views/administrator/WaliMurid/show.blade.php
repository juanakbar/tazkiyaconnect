<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
        <div class="col-span-8">
            <form method="POST" enctype="multipart/form-data" x-data='form'
                class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726] "
                action="{{ route("walimurid.update", $walimurid->slug) }}">
                @csrf
                @method("PUT")
                <h6 class="mb-5 text-lg font-bold">Informasi Orang Tua & Murid</h6>
                <div class="flex flex-col sm:flex-row">

                    <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name">Nama Orang Tua</label>
                            <input id="name" type="name" placeholder="Masukkan Nama Orang Tua"
                                class="form-input" name="name" value="{{ old("name", $walimurid->user->name) }}" />
                            @error("name")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror

                        </div>
                        <div>
                            <label for="email">Email Orang Tua</label>
                            <input id="email" type="email" placeholder="Masukkan Email Orang Tua"
                                class="form-input" name="email" value="{{ old("email", $walimurid->user->email) }}" />
                            @error("email")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="nik">Nomor Induk Kependudukan Orang Tua</label>
                            <input id="nik" type="number" placeholder="Masukkan Nik Orang Tua" class="form-input"
                                name="nik" value="{{ old("nik", $walimurid->nik) }}" />
                            @error("nik")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="agama">Agama Orang Tua</label>
                            <select id="agama" name="agama" class="form-select">
                                <option value="" selected disabled>Pilih Agama Orang Tua...</option>
                                <option {{ $walimurid->agama == "islam" ? "selected" : "" }} value="islam">Islam
                                </option>
                                <option {{ $walimurid->agama == "kristen" ? "selected" : "" }} value="kristen">Kristen
                                </option>
                                <option {{ $walimurid->agama == "katolik" ? "selected" : "" }} value="katolik">Katolik
                                </option>
                                <option {{ $walimurid->agama == "budha" ? "selected" : "" }} value="budha">Budha
                                </option>
                                <option {{ $walimurid->agama == "hindu" ? "selected" : "" }}value="hindu">Hindu</option>
                                <option {{ $walimurid->agama == "konghucu" ? "selected" : "" }}value="konghucu">Konghucu
                                </option>
                            </select>
                            @error("agama")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tempat_lahir">Tempat Lahir Orang Tua</label>
                            <input id="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir Orang Tua"
                                class="form-input" name="tempat_lahir"
                                value="{{ old("tempat_lahir", $walimurid->tempat_lahir) }}" />

                            @error("tempat_lahir")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tempat_lahir">Tanggal Lahir Orang Tua</label>
                            <input id="basic" x-model="currentDate" class="form-input" name="tanggal_lahir"
                                value="{{ old("tanggal_lahir", $walimurid->tanggal_lahir) }}" />
                            @error("tanggal_lahir")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="pendidikan">Pendidikan Orang Tua</label>
                            <input id="pendidikan" type="text" placeholder="Masukkan Pendidikan Orang Tua"
                                class="form-input" name="pendidikan"
                                value="{{ old("pendidikan", $walimurid->pendidikan) }}" />
                            @error("pendidikan")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="pekerjaan">Pekerjaan Orang Tua</label>
                            <input id="pekerjaan" type="text" placeholder="Masukkan Pekerjaan Orang Tua"
                                class="form-input" name="pekerjaan"
                                value="{{ old("pekerjaan", $walimurid->pekerjaan) }}" />
                            @error("pekerjaan")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div>
                            <label for="kewarganeraan">Kewarganegaraan Orang Tua</label>
                            <input id="kewarganeraan" type="text" placeholder="Masukkan Kewarganegaraan Orang Tua"
                                class="form-input" name="kewarganeraan"
                                value="{{ old("kewarganeraan", $walimurid->kewarganeraan) }}" />
                            @error("kewarganeraan")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror

                        </div>
                        <div class="col-span-full">
                            <label for="alamat">Alamat Orang Tua</label>
                            <input id="alamat" type="text" placeholder="Masukkan Alamat Orang Tua"
                                class="form-input" name="alamat"
                                value="{{ old("tempat_lahir", $walimurid->tempat_lahir) }}" />
                            @error("alamat")
                                <p class="text-danger mt-1">Mohon dicek Kembali</p>
                            @enderror
                        </div>
                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                                    src="{{ asset("storage/" . $walimurid->user->avatar) }}"
                                    alt="Current profile photo" />
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

                        <div class="mt-3 sm:col-span-2">
                            <p>{{ $walimurid->tanggal_lahir }}</p>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-span-4">
            <form class="rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                <h6 class="mb-5 text-lg font-bold">Peserta Didik</h6>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="flex">
                        <div
                            class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                </path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </div>
                        <input type="text" placeholder="jimmy_turner" class="form-input" />
                    </div>
                    <div class="flex">
                        <div
                            class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path
                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                </path>
                            </svg>
                        </div>
                        <input type="text" placeholder="jimmy_turner" class="form-input" />
                    </div>
                    <div class="flex">
                        <div
                            class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </div>
                        <input type="text" placeholder="jimmy_turner" class="form-input" />
                    </div>
                    <div class="flex">

                        <div
                            class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path
                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                            </svg>
                        </div>
                        <input type="text" placeholder="jimmy_turner" class="form-input" />
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
            const date1 = {{ $walimurid->tanggal_lahir }};
            console.log(date1);
            document.addEventListener('alpine:init', () => {
                console.log({!! $walimurid->tanggal_lahir !!});
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

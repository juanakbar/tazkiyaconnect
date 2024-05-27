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
                        <label for="pendapatan">Pendapatan Orang Tua</label>
                        <input id="pendapatan" type="text" placeholder="Masukkan Pendapatan Orang Tua"
                            class="form-input" name="pendapatan" />
                        @error("pendapatan")
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
                    <div>
                        <label for="province_code">Provinsi</label>
                        <select id="province_code" name="province_code" class="form-select placeholder:text-gray-300">
                            <option value="" selected disabled>Pilih Provinsi Orang Tua...</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->code }}">{{ $province->name }} </option>
                            @endforeach
                        </select>
                        @error("province_code")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div id="city_code_container">
                        <label for="city_code">Kota</label>
                        <select id="city_code" name="city_code" class="form-select" placeholder="Pilih Kota">
                            <option value="" selected disabled>Pilih Provinsi Orang Tua...</option>
                        </select>
                        @error("city_code")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div id="district_code_container">
                        <label for="district_code">Kecamatan</label>
                        <select id="district_code" name="district_code" class="form-select">
                            <option value="" selected disabled>Pilih Kecamatan Orang Tua...</option>
                        </select>
                        @error("district_code")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div id="village_code_container">
                        <label for="village_code">Desa</label>
                        <select id="village_code" name="village_code" class="form-select">
                            <option value="" selected disabled>Pilih Desa Orang Tua...</option>
                        </select>
                        @error("village_code")
                            <p class="text-danger mt-1">Mohon dicek Kembali</p>
                        @enderror
                    </div>
                    <div class="col-span-full">
                        <label for="alamat">Alamat Orang Tua</label>
                        <input id="alamat" type="text" placeholder="Masukkan Alamat Orang Tua"
                            class="form-input" name="alamat" />
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
            let selectedProvince;
            let selectedCity;
            let selectedDistrict;
            document.addEventListener("DOMContentLoaded", function(e) {

                const provinceSelect = document.getElementById('province_code');
                const agamaSelect = document.getElementById('agama');
                const citySelect = document.getElementById('city_code');
                const districtSelect = document.getElementById('district_code');
                const villageSelect = document.getElementById('village_code');


                provinceSelect.addEventListener('change', function() {
                    const selectedProvince = this.value;
                    fetch(`/api/cities/${selectedProvince}`)
                        .then(response => response.json())
                        .then(data => {
                            citySelect.innerHTML = '';
                            citySelect.innerHTML =
                                ' <option value="" selected disabled>Pilih Provinsi Orang Tua...</option>'
                            // Tambahkan opsi baru dari data yang diterima
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.code;
                                option.textContent = item.name;
                                citySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);

                            // Hapus opsi lama sebelum menambahkan yang baru
                            citySelect.innerHTML = '';

                            // Tambahkan opsi kesalahan
                            const errorOption = document.createElement('option');
                            errorOption.value = '';
                            errorOption.textContent = 'Error loading data';
                            citySelect.appendChild(errorOption);
                        });
                });
                citySelect.addEventListener('change', function() {
                    selectedCity = event.target.value
                    fetch(`/api/districts/${selectedCity}`)
                        .then(response => response.json())
                        .then(data => {
                            districtSelect.innerHTML = '';
                            districtSelect.innerHTML =
                                '<option value="" selected disabled>Pilih Kecamatan Orang Tua...</option>'
                            // Tambahkan opsi baru dari data yang diterima
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.code;
                                option.textContent = item.name;
                                districtSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);

                            // Hapus opsi lama sebelum menambahkan yang baru
                            districtSelect.innerHTML = '';

                            // Tambahkan opsi kesalahan
                            const errorOption = document.createElement('option');
                            errorOption.value = '';
                            errorOption.textContent = 'Error loading data';
                            districtSelect.appendChild(errorOption);
                        });
                });
                districtSelect.addEventListener('change', function() {
                    selectedDistrict = event.target.value
                    fetch(`/api/villages/${selectedDistrict}`)
                        .then(response => response.json())
                        .then(data => {
                            villageSelect.innerHTML = '';
                            villageSelect.innerHTML =
                                '<option value="" selected disabled>Pilih Kecamatan Orang Tua...</option>'
                            // Tambahkan opsi baru dari data yang diterima
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.code;
                                option.textContent = item.name;
                                villageSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);

                            // Hapus opsi lama sebelum menambahkan yang baru
                            villageSelect.innerHTML = '';

                            // Tambahkan opsi kesalahan
                            const errorOption = document.createElement('option');
                            errorOption.value = '';
                            errorOption.textContent = 'Error loading data';
                            villageSelect.appendChild(errorOption);
                        });
                });

            })
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

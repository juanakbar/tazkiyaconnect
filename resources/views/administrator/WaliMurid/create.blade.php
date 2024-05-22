<div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'" ">
    <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
        <div x-show="open" x-transition x-transition.duration.300
            class="panel my-8 w-full max-w-6xl overflow-hidden rounded-lg border-0 py-1 px-4">
            <div class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                Tambah Wali Murid
                <button type="button" @click="toggle" class="text-white-dark hover:text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="h-6 w-6">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="p-5" x-data="form" >
                <form class="space-y-5" action="{{ route('walimurid.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="nama">Nama Orang Tua</label>
                            <input id="nama" type="nama" placeholder="Masukkan Nama Orang Tua"
                                class="form-input" name="nama" />
                        </div>
                        <div>
                            <label for="email">Email Orang Tua</label>
                            <input id="email" type="email" placeholder="Masukkan Email Orang Tua"
                                class="form-input" name="email"/>
                        </div>
                        <div>
                            <label for="nik">Nomor Induk Kependudukan Orang Tua</label>
                            <input id="nik" type="number" placeholder="Masukkan Nik Orang Tua"
                                class="form-input" name="nik" />
                        </div>
                        <div>
                            <label for="agama">Agama Orang Tua</label>
                            <select class="selectize" placeholder="Pilih Agama Orang Tua..." id="agama"
                                name="agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="budha">Budha</option>
                                <option value="hindu">Hindu</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label for="tempat_lahir">Tempat Lahir Orang Tua</label>
                            <input id="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir Orang Tua"
                                class="form-input" name="tempat_lahir" />
                        </div>
                        <div>
                            <label for="tempat_lahir">Tanggal Lahir Orang Tua</label>
                           <input id="basic" x-model="currentDate" class="form-input" name="tanggal_lahir"/>
                        </div>
                        <div>
                            <label for="pendidikan">Pendidikan Orang Tua</label>
                            <input id="pendidikan" type="text" placeholder="Masukkan Pendidikan Orang Tua"
                                class="form-input" name="pendidikan" />
                        </div>
                        <div>
                            <label for="pekerjaan">Pekerjaan Orang Tua</label>
                            <input id="pekerjaan" type="text" placeholder="Masukkan Pekerjaan Orang Tua"
                                class="form-input" name="pekerjaan"  />
                        </div>
                        <div>
                            <label for="pendapatan">Pendapatan Orang Tua</label>
                            <input id="pendapatan" type="text" placeholder="Masukkan Pendapatan Orang Tua"
                                class="form-input" name="pendapatan"  />
                        </div>
                        <div>
                            <label for="kewarganegaraan">Kewarganegaraan Orang Tua</label>
                            <input id="kewarganegaraan" type="text" placeholder="Masukkan Kewarganegaraan Orang Tua"
                                class="form-input" name="kewarganegaraan" />
                        </div>
                    </div>
                    <div>
                        <label for="alamat">Alamat Orang Tua</label>
                        <input id="alamat" type="text" placeholder="Masukkan Alamat Orang Tua"
                            class="form-input" name="alamat" />
                    </div>
                    <div>
                       <input type="file" class="custom-file-container" data-upload-id="myFirstImage" name="avatar" id="avatar">
                    </div>
                    <div class="flex items-end justify-end">
                        <button type="submit" class="btn btn-primary !mt-6">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

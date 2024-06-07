 <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
     <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
         <div x-show="open" x-transition x-transition.duration.300
             class="panel my-8 w-full max-w-lg overflow-hidden rounded-lg border-0 p-0">
             <div class="flex items-center justify-between bg-[#fbfbfb] px-5 py-3 dark:bg-[#121c2c]">
                 <div class="text-lg font-bold">Tambah Kegiatan</div>
                 <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                         stroke-linejoin="round" class="h-6 w-6">
                         <line x1="18" y1="6" x2="6" y2="18"></line>
                         <line x1="6" y1="6" x2="18" y2="18"></line>
                     </svg>
                 </button>
             </div>
             <div class="p-5">
                 <form action="{{ route("khs.store") }}" method="POST">
                     @csrf
                     <div class=" mb-3">
                         <label for="kelas_id">Nama Kegiatan</label>
                         <select name="kelas_id" id="kelas_id" class="form-select">
                             @foreach ($class as $item)
                                 <option value="{{ $item->id }}">Kelas
                                     {{ $item->grade }} - Level {{ $item->level }}</option>
                             @endforeach
                         </select>
                     </div>

                     <div class="mb-3">
                         <label for="name">Nama Kegiatan</label>
                         <input id="name" type="text" placeholder="Masukkan Kegiatan" class="form-input"
                             name="name" value="{{ old("name") }}" />
                         @error("name")
                             <p class="text-danger mt-1">Mohon dicek Kembali</p>
                         @enderror
                     </div>
                     <div class="mb-3">
                         <label for="nilai">Nilai Kegiatan</label>
                         <input id="nilai" type="number" placeholder="Masukkan Nilai Kegiatan" class="form-input"
                             name="nilai" value="{{ old("nilai") }}" />
                         @error("nilai")
                             <p class="text-danger mt-1">Mohon dicek Kembali</p>
                         @enderror
                     </div>

                     <div class="mt-8 flex items-center justify-end">
                         <button type="button" class="btn btn-outline-danger" @click="toggle">Batal</button>
                         <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Simpan</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

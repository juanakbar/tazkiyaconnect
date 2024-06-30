 <div class="panel">
     <h5 class="text-lg font-semibold dark:text-white-light">Siswa Ayah/Bunda</h5>

     <div x-data='striped'>
         <table id="walMurTable" class="table-striped table-hover table-bordered table-compact">
             <thead>
                 <tr>
                     <th>Nama</th>
                     <th>Wali Kelas</th>
                     <th>Kelas</th>
                     <th>NISN</th>
                     <th>NIS</th>
                     <th>Jenis Kelamin</th>
                     <th>Tempat Lahir</th>
                     <th>Tanggal Lahir</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($siswas as $siswa)
                     <tr>
                         <td>
                             <div class="flex items-center gap-2">
                                 <img src="{{ asset("storage/" . $siswa->avatar) }}"
                                     class="w-9 h-9 rounded-full max-w-none" alt="user-profile" />
                                 <div class="font-semibold">{{ $siswa->name }}</div>
                             </div>
                         </td>
                         <td>{{ $siswa->kelas->waliKelas->user->name }}</td>
                         <td>Kelas {{ $siswa->kelas->grade }} - Level {{ $siswa->kelas->level }}</td>
                         <td>{{ $siswa->nisn }}</td>
                         <td>{{ $siswa->nis }}</td>
                         <td>
                             @if ($siswa->jenis_kelamin === "P")
                                 Perempuan
                             @else
                                 Laki-Laki
                             @endif
                         </td>
                         <td>{{ $siswa->tempat_lahir }}</td>
                         <td>{{ $siswa->tanggal_lahir }}</td>
                         <td class="border-b border-[#ebedf2] p-3 text-center dark:border-[#191e3a]">
                             <ul class="flex items-center justify-center gap-2">
                                 <button type="button" x-tooltip="Detail">
                                     <a href="{{ route("siswa_anda", $siswa) }}">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                             <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                             <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                             <path
                                                 d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                         </svg>
                                     </a>
                                 </button>

                             </ul>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>


 </div>


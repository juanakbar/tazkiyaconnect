<x-app-layout>
    <div class="panel">
        <h5 class="text-lg font-semibold dark:text-white-light">Siswa Kelas {{ $kelas->grade }} - Level
            {{ $kelas->level }}
        </h5>

        <div x-data='striped'>
            {{-- {{ $dataTable->table() }} --}}
            <table id="walMurTable" class="table-striped table-hover table-bordered table-compact">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Orang Tua</th>
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
                            <td>{{ $siswa->waliMurid->name }}</td>
                            <td>Kelas {{ $siswa->kelas->grade }} - Level {{ $siswa->kelas->level }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>
                                @if ($siswa->jenis_kelamin === "P")
                                    Perempuam
                                @else
                                    Laki-Laki
                                @endif
                            </td>
                            <td>{{ $siswa->tempat_lahir }}</td>
                            <td>{{ $siswa->tanggal_lahir }}</td>
                            <td class="border-b border-[#ebedf2] p-3 text-center dark:border-[#191e3a]">
                                <ul class="flex items-center justify-center gap-2">

                                    <button type="button" x-tooltip="Edit">
                                        <a href="{{ route("siswa.edit", $siswa) }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2">
                                                <path
                                                    d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                    </button>
                                    <button type="button" x-tooltip="Delete"
                                        @click="showAlert('{{ $siswa->id }}')">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                            <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path
                                                d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" />
                                            <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" />
                                            <path opacity="0.5"
                                                d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                    </button>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- @json($siswas) --}}
        </div>
    </div>
    @push("CSS")
        <link rel='stylesheet' type='text/css' href='{{ Vite::asset("resources/css/nice-select2.css") }}'>
        <link rel="stylesheet" href="{{ Vite::asset("resources/css/flatpickr.min.css") }}">
    @endpush

    @push("JS")
        <script src="{{ asset("assets/js/nice-select2.js") }}"></script>
        <script src="{{ asset("assets/js/flatpickr.js") }}"></script>
        <script src="{{ asset("assets/js/file-upload-with-preview.iife.js") }}"></script>
        <script src="{{ asset("assets/js/simple-datatables.js") }}"></script>
        <script>
            async function showAlert(id) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                new window.Swal({
                    icon: 'warning',
                    title: 'Apakah Kamu Yakin?',
                    text: "Hal Ini Tidak Bisa Di Kembalikan!",
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    padding: '2em',
                }).then(async (result) => {
                    if (result.value) {
                        try {
                            const response = await fetch(`{{ route("siswa.destroy", ":id") }}`.replace(
                                ':id', id), {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken // Pastikan CSRF token disertakan
                                }
                            });

                            if (response.ok) {
                                new window.Swal('Berhasil!', 'Data Siswa Berhasil di Hapus.',
                                    'success');
                                setTimeout(() => {
                                    location
                                        .reload(); // Reload page after deletion                                    
                                }, 1000);
                                // Optional: Refresh the page or remove the item from the DOM
                            } else {
                                console.log(response);
                                new window.Swal('Error!', 'Data Siswa Gagal Dihapus', 'error');
                            }
                        } catch (error) {
                            new window.Swal('Error!', error.message, 'error');
                        }
                    }
                });
            }
        </script>
        <script>
            const date = new Date();
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let currentDate = `${year}-0${month}-${day}`;


            document.addEventListener('alpine:init', () => {


                Alpine.data('striped', () => ({
                    init() {
                        const tableOptions = {
                            sortable: true,
                            searchable: true,
                            perPage: 10,
                            select: true,
                            perPageSelect: [10, 20, 30, 50, 100],
                            firstLast: true,
                            firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                            labels: {
                                perPage: '{select}',
                            },
                            layout: {
                                top: '{search}',
                                bottom: '{info}{select}{pager}',
                            },
                        };

                        const datatable5 = new simpleDatatables.DataTable('#walMurTable', tableOptions);
                    },
                }));
            });
        </script>
    @endpush
</x-app-layout>

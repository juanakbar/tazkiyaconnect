<x-app-layout>
    <div class="panel">
        <h5 class="text-lg font-semibold dark:text-white-light">Siswa Kelas {{ $siswas->grade }} - Level
            {{ $siswas->level }}
        </h5>

        <div x-data='striped'>
            {{-- {{ $dataTable->table() }} --}}
            <table id="walMurTable" class="table-striped table-hover table-bordered table-compact">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Orang Tua</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas->siswas as $siswa)
                        <tr>
                            <td>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset("storage/" . $siswa->avatar) }}"
                                        class="w-9 h-9 rounded-full max-w-none" alt="user-profile" />
                                    <div class="font-semibold">{{ $siswa->name }}</div>
                                </div>
                            </td>
                            <td>{{ $siswa->waliMurid->name }}</td>
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
                            <td x-tooltip="Lihat KHS {{ $siswa->name }}" class="text-end">
                                <a href="{{ route("murid-anda.show", $siswa) }}"
                                    class="hover:underline hover:text-primary">
                                    Lihat Detail Siswa
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
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

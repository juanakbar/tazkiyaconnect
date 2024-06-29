<x-app-layout>
    <div>
        {{-- @include("administrator.kelas.create") --}}
        <div class="panel">
            <h5 class="text-lg font-semibold dark:text-white-light">Kelas Anda Mengajar</h5>
            <div x-data='striped'>
                {{-- {{ $dataTable->table() }} --}}
                <table id="kelasTable" class="table-striped table-hover table-bordered table-compact">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Level</th>
                            <th>KHS</th>
                            <th>Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelass as $item)
                            <tr>
                                <td>{{ $item->grade }}</td>
                                <td>{{ $item->level }}</td>

                                <td class="hover:underline hover:text-primary">
                                    @if ($item->tasks->count() > 0)
                                        <a href="{{ route("task.index", ["kelas" => $item->id]) }}"
                                            class="flex items-center gap-2" x-tooltip="Klik Untuk Melihat KHS Kelas">
                                            Lihat KHS
                                        </a>
                                    @else
                                        <a href="{{ route("task.index", ["kelas" => $item->id]) }}"
                                            class="text-primary block hover:underline">Buat KHS</a>
                                    @endif

                                </td>
                                <td>
                                    @if ($item->siswas->count() > 0)
                                        <a href="{{ route("murid-anda.index", ["kelas" => $item->slug]) }}"
                                            class="hover:underline hover:text-primary flex items-center gap-2"
                                            x-tooltip="Klik Untuk Melihat Siswa">
                                            Lihat Siswa
                                        </a>
                                    @else
                                        Belum Ada Siswa
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @json($items) --}}
            </div>
        </div>
    </div>
    @push("JS")
        <script src="{{ asset("assets/js/simple-datatables.js") }}"></script>

        <script>
            let datatable5;
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
                            firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class = "w-4.5 h-4.5 rtl:rotate-180" > < path d = "M13 19L7 12L13 5" stroke = "currentColor" stroke - width = "1.5" stroke - linecap = "round" stroke - linejoin = "round" / > < path opacity = "0.5" d = "M16.9998 19L10.9998 12L16.9998 5" stroke = "currentColor" stroke - width = "1.5" stroke - linecap = "round" stroke - linejoin = "round" / > < /svg>',
                            lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class = "w-4.5 h-4.5 rtl:rotate-180" > < path d = "M11 19L17 12L11 5" stroke = "currentColor" stroke - width = "1.5" stroke - linecap = "round" stroke - linejoin = "round" / > < path opacity = "0.5" d = "M6.99976 19L12.9998 12L6.99976 5" stroke = "currentColor" stroke - width = "1.5" stroke - linecap = "round" stroke - linejoin = "round" / > < /svg>',
                            prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class = "w-4.5 h-4.5 rtl:rotate-180" > < path d = "M15 5L9 12L15 19" stroke = "currentColor" stroke - width = "1.5" stroke - linecap = "round" stroke - linejoin = "round" / > < /svg>',
                            nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns = "http://www.w3.org/2000/svg" class = "w-4.5 h-4.5 rtl:rotate-180" > < path d = "M9 5L15 12L9 19" stroke = "currentColor" stroke - width = "1.5" stroke - linecap = "round" stroke - linejoin = "round" / > < /svg>',
                            labels: {
                                perPage: '{select}',
                            },
                            layout: {
                                top: '{search}',
                                bottom: '{info}{select}{pager}',
                            },
                        };

                        datatable5 = new simpleDatatables.DataTable('#kelasTable', tableOptions);
                    },
                }));
            });
            async function showAlert(slug) {
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
                            const response = await fetch(`{{ route("kelas.destroy", ":slug") }}`
                                .replace(
                                    ':slug', slug), {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken // Pastikan CSRF token disertakan
                                    }
                                });

                            if (response.ok) {
                                new window.Swal('Berhasil!', 'Data Wali Kelas Berhasil di Hapus.',
                                    'success');
                                setTimeout(() => {
                                    location
                                        .reload(); // Reload page after deletion                                    
                                }, 1000);

                                // Optional: Refresh the page or remove the item from the DOM
                            } else {
                                console.log(response);
                                new window.Swal('Error!', 'Data Wali KelaasGagal Dihapus', 'error');
                            }
                        } catch (error) {
                            new window.Swal('Error!', error.message, 'error');
                        }
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>

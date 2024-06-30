<x-app-layout>
    <div class="pt-5">
        <div class="mb-6 grid gap-6 sm:grid-cols-3 xl:grid-cols-4">
            <div class="panel h-full p-0">
                <div class="flex p-5">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary dark:bg-primary dark:text-white-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                        </svg>
                    </div>
                    <div class="font-semibold ltr:ml-3 rtl:mr-3">
                        <p class="text-xl dark:text-white-light">{{ $allSiswas }}</p>
                        <h5 class="text-xs text-[#506690]">Siswa</h5>
                    </div>
                </div>
            </div>
            <div class="panel h-full p-0">
                <div class="flex p-5">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary dark:bg-primary dark:text-white-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-pentagon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M13.163 2.168l8.021 5.828c.694 .504 .984 1.397 .719 2.212l-3.064 9.43a1.978 1.978 0 0 1 -1.881 1.367h-9.916a1.978 1.978 0 0 1 -1.881 -1.367l-3.064 -9.43a1.978 1.978 0 0 1 .719 -2.212l8.021 -5.828a1.978 1.978 0 0 1 2.326 0z" />
                            <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                            <path d="M6 20.703v-.703a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.707" />
                        </svg>
                    </div>
                    <div class="font-semibold ltr:ml-3 rtl:mr-3">
                        <p class="text-xl dark:text-white-light">{{ $walikelas }}</p>
                        <h5 class="text-xs text-[#506690]">Wali Kelas</h5>
                    </div>
                </div>
            </div>
            <div class="panel h-full p-0">
                <div class="flex p-5">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary dark:bg-primary dark:text-white-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-square-rounded">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                            <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                        </svg>
                    </div>
                    <div class="font-semibold ltr:ml-3 rtl:mr-3">
                        <p class="text-xl dark:text-white-light">{{ $walimurids }}</p>
                        <h5 class="text-xs text-[#506690]">Wali Murid</h5>
                    </div>
                </div>
            </div>
            <div class="panel h-full p-0">
                <div class="flex p-5">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary dark:bg-primary dark:text-white-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trophy">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 21l8 0" />
                            <path d="M12 17l0 4" />
                            <path d="M7 4l10 0" />
                            <path d="M17 4v8a5 5 0 0 1 -10 0v-8" />
                            <path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        </svg>
                    </div>
                    <div class="font-semibold ltr:ml-3 rtl:mr-3">
                        <p class="text-xl dark:text-white-light">{{ $prestasis->count() }}</p>
                        <h5 class="text-xs text-[#506690]">Siswa Prestasi</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel lg:col-span-2 xl:col-span-3">
            <div class="mb-5 flex justify-between gap-3 items-center">
                <h5 class="text-lg font-semibold dark:text-white-light whitespace-nowrap">Siswa Prestasi</h5>

            </div>
            <div class="mt-5">
                <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                    <table class="whitespace-nowrap">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Nama Prestasi</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-white-dark">
                            @forelse ($prestasis as $item)
                                <tr>
                                    <td>{{ $item->siswa->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Belum Ada Prestasi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        @role("WaliMurid")
            <div class="mt-5">@include("walimurid.index")</div>
        @endrole
    </div>

    @push("JS")
        <script src="{{ asset("assets/js/nice-select2.js") }}"></script>
        <script src="{{ asset("assets/js/flatpickr.js") }}"></script>
        <script src="{{ asset("assets/js/file-upload-with-preview.iife.js") }}"></script>
        <script src="{{ asset("assets/js/simple-datatables.js") }}"></script>

        <script>
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

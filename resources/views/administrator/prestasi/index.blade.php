<x-app-layout>
    <div>
        <div class="panel">
            <h5 class="text-lg font-semibold dark:text-white-light">Siswa Berprestasi</h5>
            <div class="md:absolute  ltr:md:left-5 rtl:md:right-5">
                <div class="mb-5 flex flex-wrap items-center" x-data="modal">
                    <button @click="toggle" type="button" class="btn btn-primary btn-sm m-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                            <path
                                d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z"
                                fill="currentColor" />
                            <path opacity="0.5"
                                d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                                stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        Tambah Siswa Berprestasi
                    </button>
                    @include("administrator.prestasi.create")
                </div>
            </div>
            <div x-data='striped'>
                {{-- {{ $dataTable->table() }} --}}
                <table id="kelasTable" class="table-striped table-hover table-bordered table-compact">
                    <thead>
                        <tr>
                            <th>Nama Prestasi</th>
                            <th>Nama Siswa</th>
                            <th>Deskripsi</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prestasis as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->siswa->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td class="border-b border-[#ebedf2] p-3  flex items-end justify-end">
                                    <div x-data="update">
                                        <button @click="toggle" x-tooltip="Detail">
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
                                        </button>
                                        @include("administrator.prestasi.update")
                                    </div>

                                    <div>
                                        <button type="button" x-tooltip="Delete"
                                            @click="showAlert('{{ $item->id }}')">
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
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @json($items) --}}
            </div>
        </div>
    </div>
    @push("CSS")
        <link rel='stylesheet' type='text/css' href='{{ Vite::asset("resources/css/nice-select2.css") }}'>
    @endpush
    @push("JS")
        <script src="/assets/js/nice-select2.js"></script>
        <script src="{{ asset("assets/js/simple-datatables.js") }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(e) {
                // seachable 
                var options = {
                    searchable: true,
                    placeholder: 'Pilih Siswa'
                };
                NiceSelect.bind(document.getElementById("siswa_id"), options);
                NiceSelect.bind(document.getElementById("kelas_id_update"), options);
            });
        </script>
        <script>
            let datatable5;
            document.addEventListener('alpine:init', () => {

                Alpine.data("update", (initialOpenState = false) => ({
                    open: initialOpenState,

                    toggle() {
                        this.open = !this.open;
                    },

                }));
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

                        datatable5 = new simpleDatatables.DataTable('#kelasTable',
                            tableOptions);
                    },
                }));


            });
            async function showAlert(id) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content');
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
                            const response = await fetch(
                                `{{ route("prestasi.destroy", ":id") }}`
                                .replace(
                                    ':id', id), {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken // Pastikan CSRF token disertakan
                                    }
                                });

                            if (response.ok) {
                                new window.Swal('Berhasil!',
                                    'Data Prestasi Berhasil di Hapus.',
                                    'success');
                                setTimeout(() => {
                                    location
                                        .reload(); // Reload page after deletion                                    
                                }, 1000);

                                // Optional: Refresh the page or remove the item from the DOM
                            } else {
                                console.log(response);
                                new window.Swal('Error!', 'Data Prestasi Gagal Dihapus',
                                    'error');
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

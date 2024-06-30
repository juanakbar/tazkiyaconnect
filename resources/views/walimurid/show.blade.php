<x-app-layout>
    <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4">
        <div class="panel ">
            <div class="mb-5">
                <div class="flex flex-col items-center justify-center">
                    <img src="{{ asset("storage/" . $siswa->avatar) }}" alt="image"
                        class="mb-5 h-24 w-24 rounded-full object-cover">
                    <p class="text-xl font-semibold text-primary">{{ $siswa->name }}</p>
                </div>
                <ul class="mt-5 flex flex-col items-start space-y-4 font-semibold text-dark">
                    <li class="flex items-start gap-2">
                        Anak Dari : {{ $siswa->waliMurid->name }}
                    </li>
                    <li class="flex items-start gap-2">
                        Email Orang Tua : {{ $siswa->waliMurid->email }}
                    </li>
                    <li class="flex items-start gap-2">
                        Alamat Orang Tua : {{ $siswa->waliMurid->waliMurid->alamat }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel lg:col-span-2 xl:col-span-3">
            <div class="mb-5 flex justify-between gap-3 items-center">
                <h5 class="text-lg font-semibold dark:text-white-light whitespace-nowrap">Kegiatan Harian Siswa</h5>
                <div>
                    <form class="flex gap-3">
                        <input type="date" name="created_at" id="created_at" class="form-input w-48"
                            value="{{ request()->has("created_at") ? Carbon\Carbon::parse(request()->created_at)->toDateString() : Carbon\Carbon::today()->toDateString() }}">
                        <button class="btn btn-primary">Cari</button>
                        <a class="btn btn-secondary" href="{{ route("murid-anda.show", $siswa) }}">Hari Ini</a>
                    </form>
                </div>
            </div>
            <div class="mb-5">
                <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                    <table class="whitespace-nowrap">
                        <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Nilai</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-white-dark">
                            @forelse ($penilaians as $item)
                                <tr>
                                    <td>{{ $item->task->name }}</td>
                                    <td class="text-danger flex text-sm">
                                        @php
                                            $nilai = $item->nilai;
                                            $fullStars = floor($nilai);
                                            $halfStar = $nilai - $fullStars >= 0.5 ? true : false;
                                        @endphp

                                        @for ($i = 0; $i < $fullStars; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 24 24" fill="currentColor"
                                                class="icon icon-tabler icons-tabler-filled icon-tabler-star">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                                            </svg>
                                        @endfor

                                        @if ($halfStar)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 24 24" fill="currentColor"
                                                class="icon icon-tabler icons-tabler-filled icon-tabler-star-half">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($item->created_at)->format("d-m-Y") }}
                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td>Belum Ada Penilain Untuk Tanggal
                                        {{ Carbon\Carbon::parse(request()->created_at)->format("d-m-Y") }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="panel lg:col-span-2 xl:col-span-3">
        <div class="mb-5 flex justify-between gap-3 items-center">
            <h5 class="text-lg font-semibold dark:text-white-light whitespace-nowrap">Prestasi Anak Anda</h5>

        </div>
        <div class="mt-5">
            <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                <table class="whitespace-nowrap">
                    <thead>
                        <tr>
                            <th>Nama Prestasi</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="dark:text-white-dark">
                        @forelse ($siswa->prestasis as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>

                                <td>
                                    {{ Carbon\Carbon::parse($item->created_at)->format("d-m-Y") }}
                                </td>
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
</x-app-layout>

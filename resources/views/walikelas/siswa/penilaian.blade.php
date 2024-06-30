<x-app-layout>


    <form class="panel" method="post"method="post" action="{{ route("penilaian_post", $siswa->id) }}">
        <div class="mb-5 flex justify-between gap-3 items-center">
            <h5 class="text-lg font-semibold dark:text-white-light whitespace-nowrap">Penilaian KHS {{ $siswa->name }}
                Pada Tanggal {{ Carbon\Carbon::parse(request()->created_at)->translatedFormat("d F Y") }}</h5>
        </div>
        @method("POST")
        @csrf
        <div class="mb-5">
            <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                <table class="whitespace-nowrap">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="dark:text-white-dark">
                        @forelse ($tasks as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="w-64">
                                    <input type="hidden" name="task_id[]" id="task_id[]" value="{{ $item->id }}">
                                    <input type="hidden" name="siswa_id" id="siswa_id" value="{{ $siswa->id }}">
                                    <input type="hidden" name="created_at" id="created_at" class="form-input w-48"
                                        value="{{ Carbon\Carbon::parse(request()->created_at)->toDateString() }}">

                                    <input class="form-input w-64" type="text" value="{{ old("nilai") }}"
                                        name="nilai[]" id="nilai[]">

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Belum Ada Kegiatan Harian Siswa, Hubungi Administrator
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex items-end justify-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</x-app-layout>

 <x-app-layout>
     <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
         <div class="panel">
             <div class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                 Pilih Wali Kelas Untuk Kelas {{ $kelas->grade }} Level {{ $kelas->level }}

             </div>
             <div class="p-5">
                 <form action="{{ route("assign_wali_kelas", $kelas->slug) }}" method="POST">
                     @csrf
                     <select name="wali_kelas_id" id="wali_kelas_id" class="selectize mb-3">
                         @foreach ($waliKelas as $item)
                             {{ $item->name }}
                             <option {{ $item->id === $kelas->wali_kelas_id ? "selected" : "" }}
                                 value="{{ $item->id }}">{{ $item->user->name }}</option>
                         @endforeach
                     </select>
                     <button type="submit" class="btn btn-primary w-full">Login</button>
                 </form>
             </div>
         </div>
     </div>
     @push("CSS")
         <link rel='stylesheet' type='text/css' href='{{ Vite::asset("resources/css/nice-select2.css") }}'>
     @endpush
     @push("JS")
         <script src="/assets/js/nice-select2.js"></script>
         <script>
             document.addEventListener("DOMContentLoaded", function(e) {
                 // seachable 
                 var options = {
                     searchable: true,
                     placeholder: 'Pilih Wali Kelas'
                 };
                 NiceSelect.bind(document.getElementById("wali_kelas_id"), options);
             });
         </script>
     @endpush
 </x-app-layout>

<x-app-layout>
    <div class="pt-5">
        @if (Auth::user()->role->name === 'Admin')
            <p>Admin Dashboard</p>
        @elseif(Auth::user()->role->name === 'Wali Kelas')
            <p>WaliKelas Dashboard</p>
        @elseif(Auth::user()->role->name === 'Wali Murid')
            <p>WaliMurid Dashboard</p>
        @endif
    </div>
</x-app-layout>

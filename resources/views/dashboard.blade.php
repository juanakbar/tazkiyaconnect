<x-app-layout>
    <div class="pt-5">
        @role("SuperAdmin")
            Admin Dashboard
        @endrole
        @role("WaliKelas")
            Dashboard Wali Kelas
        @endrole
        @role("WaliMurid")
            Dashboard Wali Murid
        @endrole
    </div>
</x-app-layout>

<x-mazer-sidebar :href="route('dashboard')">
    <x-mazer-sidebar-item icon="bi bi-grid-fill" :link="route('dashboard')" name="Dashboard" />
    <x-mazer-sidebar-item icon="bi bi-person-fill-gear" :link="route('admin')" name="Admin" />
    <x-mazer-sidebar-item icon="bi bi-box-arrow-left" :link="route('logout')" name="Logout" />
</x-mazer-sidebar>

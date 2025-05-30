<button id="sidebarBtnToogle"
    class="fixed top-16 left-0 z-50 bg-gray-200 text-black dark:bg-gray-800 dark:text-white p-2 rounded-md shadow focus:outline-none hidden md:block "
    aria-label="Toggle sidebar">
    ☰
</button>
<!-- Sidebar -->
<div id="sidebar"
    class="fixed top-0 left-0 h-full w-40 shadow bg-gray-200 text-black dark:bg-gray-800 dark:text-white p-4 z-40 transform transition-transform duration-300
            -translate-x-full md:translate-x-0 md:static md:transform-none">


    <ul class="mt-12 space-y-4 w-full ">
        <li>
            <a href="{{ route('home') }}" class="block w-full truncate px-2 py-1 hover:bg-gray-400 dark:hover:bg-gray-700 rounded">
                🏠 Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('tenants.index') }}" class="block w-full truncate px-2 py-1 hover:bg-gray-400 dark:hover:bg-gray-700 rounded">
                🏢 Tenants
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}" class="block w-full truncate px-2 py-1 hover:bg-gray-400 dark:hover:bg-gray-700 rounded">
                👤 Users
            </a>
        </li>
        <li>
            <a href="{{ route('roles.index') }}" class="block w-full truncate px-2 py-1 hover:bg-gray-400 dark:hover:bg-gray-700 rounded">
                🛡️ Roles
            </a>
        </li>
        <li>
            <a href="{{ route('permissions.index') }}"
                class="block w-full truncate px-2 py-1 hover:bg-gray-400 dark:hover:bg-gray-700 rounded">
                🔐 Permissions
            </a>
        </li>
        <li>
            <a href="{{ route('clients.index') }}" class="block w-full truncate px-2 py-1 hover:bg-gray-400 dark:hover:bg-gray-700 rounded">
                👥 Clients
            </a>
        </li>
    </ul>

</div>

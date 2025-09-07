<nav class="bg-white shadow-md px-6   flex items-center justify-between">
    <!-- Menu -->
    <ul class="flex flex-wrap border-b border-gray-200 dark:border-gray-700 text-sm font-medium text-gray-500 dark:text-gray-400">
        <li>
            <a href="/profile"
         class="inline-block p-4 border-b-2 rounded-t-lg 
         {{ Request::is('profile') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300' }}">
        Profile
      </a>
        </li>
        <li>
            <a href="/"
         class="inline-block p-4 border-b-2 rounded-t-lg 
         {{ Request::is('/') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300' }}">
        Presensi
      </a>
        </li>
        <li>
            <a href="#"
               class="inline-block p-4 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300">
                Settings
            </a>
        </li>
        <li>
            <a href="#"
               class="inline-block p-4 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300">
                Contacts
            </a>
        </li>
        <li>
            <span class="inline-block p-4 text-gray-400 cursor-not-allowed dark:text-gray-500">
                Disabled
            </span>
        </li>
    </ul>

    <!-- Profil -->
    <div class="flex items-center gap-3">
        <span class="text-sm font-medium text-gray-700">Halo, {{ Auth::user()->first_name ?? 'User' }}</span>
        <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">
            {{ strtoupper(substr(Auth::user()->first_name ?? 'U', 0, 1)) }}
        </div>
    </div>
</nav>

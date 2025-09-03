<nav class="bg-white shadow-md px-6">
  <ul class="flex flex-wrap border-b border-gray-200 dark:border-gray-700 text-sm font-medium text-gray-500 dark:text-gray-400">
    
    <li>
      <a href="/admin"
         class="inline-block p-4 border-b-2 rounded-t-lg 
         {{ Request::is('admin') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300' }}">
        Dashboard
      </a>
    </li>

    <li>
      <a href="/admin/karyawan"
         class="inline-block p-4 border-b-2 rounded-t-lg 
         {{ Request::is('admin/karyawan*') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300' }}">
        Karyawan
      </a>
    </li>

    <li>
      <a href="/admin/presensi"
         class="inline-block p-4 border-b-2 rounded-t-lg 
         {{ Request::is('admin/presensi*') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300' }}">
        Presensi
      </a>
    </li>

    <li>
      <a href="/admin/settings"
         class="inline-block p-4 border-b-2 rounded-t-lg 
         {{ Request::is('admin/settings*') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300' }}">
        Settings
      </a>
    </li>

    <li>
      <a href="/admin/contacts"
         class="inline-block p-4 border-b-2 rounded-t-lg 
         {{ Request::is('admin/contacts*') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300' }}">
        Contacts
      </a>
    </li>

    <li>
      <span class="inline-block p-4 text-gray-400 cursor-not-allowed dark:text-gray-500">
        Disabled
      </span>
    </li>

  </ul>
</nav>

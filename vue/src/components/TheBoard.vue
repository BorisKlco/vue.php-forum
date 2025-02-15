<script setup></script>

<template>
  <div class="mt-6 outline outline-gray-400 rounded-md">
    <table class="border-collapse table-auto w-full">
      <thead>
        <tr class="bg-gray-300 text-xs text-gray-700">
          <th class="w-[70%] sm:w-[70%] py-1 px-4 border-b border-r border-gray-400 text-center">
            Category
          </th>
          <th class="w-[5%] py-1 px-4 border-b border-r border-gray-400 hidden sm:table-cell">
            Topics
          </th>
          <th class="w-[5%] py-1 px-4 border-b border-r border-gray-400 hidden sm:table-cell">
            Posts
          </th>
          <th class="sm:w-[15%] py-1 px-2 border-b border-gray-400">Last post</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-sm h-8 border-b border-gray-400">
          <th class="border-r border-gray-400 text-left px-2">
            <div class="flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6 mr-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                />
              </svg>
              <div class="flex flex-col">
                <span class="">Board Name</span>
                <span class="text-xs">Board info</span>
              </div>
            </div>
          </th>
          <th class="border-r border-gray-400 hidden sm:table-cell">16</th>
          <th class="border-r border-gray-400 hidden sm:table-cell">42</th>
          <th class="">Header 1</th>
        </tr>

        <tr class="text-sm h-8">
          <th class="border-r border-gray-400 text-left px-2">
            <div class="flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6 mr-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"
                />
              </svg>

              <div class="flex flex-col">
                <span class="">Board Name</span>
                <span class="text-xs">Board info</span>
              </div>
            </div>
          </th>
          <th class="border-r border-gray-400 hidden sm:table-cell">15</th>
          <th class="border-r border-gray-400 hidden sm:table-cell">22</th>
          <th class="">Header 2</th>
        </tr>
      </tbody>
      <thead>
        <tr class="bg-gray-300 text-xs text-gray-700 border-t border-gray-400">
          <th class="w-[70%] sm:w-[70%] py-1 px-4 border-b border-r border-gray-400 text-center">
            Another Category
          </th>
          <th class="w-[5%] py-1 px-4 border-b border-r border-gray-400 hidden sm:table-cell">
            Topics
          </th>
          <th class="w-[5%] py-1 px-4 border-b border-r border-gray-400 hidden sm:table-cell">
            Posts
          </th>
          <th class="sm:w-[15%] py-1 px-2 border-b border-gray-400">Last post</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-sm h-8 border-b border-gray-400">
          <th class="border-r border-gray-400 text-left px-2">
            <div class="flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6 mr-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                />
              </svg>
              <div class="flex flex-col">
                <span class="">Board Name</span>
                <span class="text-xs">Board info</span>
              </div>
            </div>
          </th>
          <th class="border-r border-gray-400 hidden sm:table-cell">16</th>
          <th class="border-r border-gray-400 hidden sm:table-cell">42</th>
          <th class="">Header 1</th>
        </tr>

        <tr class="text-sm h-8">
          <th class="border-r border-gray-400 text-left px-2">
            <div class="flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6 mr-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                />
              </svg>
              <div class="flex flex-col">
                <span class="">Board Name</span>
                <span class="text-xs">Board info</span>
              </div>
            </div>
          </th>
          <th class="border-r border-gray-400 hidden sm:table-cell">15</th>
          <th class="border-r border-gray-400 hidden sm:table-cell">22</th>
          <th class="">Header 2</th>
        </tr>
      </tbody>
    </table>
  </div>
</template>

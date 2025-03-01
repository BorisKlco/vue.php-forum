<template>
  <div v-for="i in 2" class="flex min-h-[8rem] sm:min-h-[12rem] border-b border-gray-400" :key="i">
    <div
      class="hidden sm:flex flex-col sm:basis-[10rem] items-center justify-center bg-gray-100 border-r border-gray-400"
    >
      <p
        class="mb-2 font-semibold tracking-wider text-gray-700 underline decoration-wavy decoration-from-font"
      >
        Anon342
      </p>
      <img
        src="https://api.dicebear.com/9.x/notionists/svg?seed=1&scale=120&beard[]"
        alt="avatar"
        class="max-w-26 m-1 rounded-full bg-gray-200 border border-gray-400 shadow-xs"
      />
    </div>
    <div class="flex flex-col basis-full">
      <div class="block sm:hidden text-xs px-1 py-0.5">User</div>
      <div class="m-2">
        <p class="">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, autem dolores. Fugit
          hic delectus consectetur dolores? Saepe quod natus, a nostrum, possimus dolor quas
          assumenda harum voluptate ut facere dicta?
        </p>
      </div>
    </div>
  </div>
</template>

<template>
 
    <MenuItem v-slot="{ active }">
      <a href="#" class="text-white-700 block px-4 py-2 text-white relative">
        📂Upload Folder
      <input @change="onChange" type="file" class="absolute left-0 top-200 bottom-50 right-0 opacity-0 " multiple directory webkitdirectory>

      </a>
    </MenuItem>
 
</template>

<script setup>
// import
import { MenuItem } from '@headlessui/vue';
import {emitter, FILE_UPLOAD_STARTED} from "@/event-bus.js";

//methods

function onChange(ev)
{
  emitter.emit(FILE_UPLOAD_STARTED,ev.target.files)
}

</script>



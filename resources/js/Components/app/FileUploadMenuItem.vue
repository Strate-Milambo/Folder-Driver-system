<template>

    <MenuItem v-slot="{ active }">
      <a href="#" class="text-gray-700 block px-4 py-2 text-white">

       
      📰 Upload Files
      <input @change="onChange" type="file" class="absolute left-0 top-200 bottom-50 right-0 opacity-0 " multiple>
      </a>
    </MenuItem>
 
</template>

<script setup>

// import
import { MenuItem } from '@headlessui/vue';
import {emitter, FILE_UPLOAD_STARTED} from "@/event-bus.js";

//methods
function onChange(ev){
console.log(ev.target.files.name);
 emitter.emit(FILE_UPLOAD_STARTED, ev.target.files)
}

</script>



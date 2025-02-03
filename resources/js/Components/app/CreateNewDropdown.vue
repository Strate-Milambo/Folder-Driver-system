<template>
     <Menu as="div" class="relative block text-left">
      <div>
        <MenuButton
          id="create"
          class="flex w-[200px]   justify-center gap-x-1.5 rounded-md bg-blue-700 px-2 py-2 text-white font-semibold
          text-white-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-blue-500"
        >
        Create New 
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>

       
        </MenuButton>
      </div>

      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="absolute left-0 mt-2 w-40 origin-top-right divide-y divide-gray-100 rounded-md bg-blue-400 shadow-lg ring-1 ring-black/5 focus:outline-none"
        >
          <div class="mt-3 text-white mb-2 space-y-1">
            <MenuItem v-slot="{ active }">
            
             <a href="#" @click.prevent="showCreateFolderModal" 
             class="text-white-700 block px-3 py-2 text-white-300">
            
                📁 New Folder
                
             </a>
            </MenuItem>
            <hr>
            <FileUploadMenuItem/>  
            <hr>
            <FolderUploadMenuItem/>
          </div>
          
         
          
          

        </MenuItems>
        
      </transition>
    </Menu>
    <CreateFolderModal v-model="createFolderModal"/>
</template>

<script setup>

//import

import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue';
import CreateFolderModal from '@/Components/app/CreateFolderModal.vue';
import FileUploadMenuItem from '@/Components/app/FileUploadMenuItem.vue';
import FolderUploadMenuItem from '@/Components/app/FolderUploadMenuItem.vue';
import { ref } from 'vue';

//refs
const createFolderModal = ref(false)


// Methodes

function showCreateFolderModal(){
createFolderModal.value = true
}

</script>



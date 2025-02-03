
<template>
  <div>

    <div class="overflow bg-gray-50 flex w-full gap-4">
    
      <Navigation v-if="!mobileView"/>
      <main @drop.prevent="handleDrop"
            @dragover.prevent="onDragOver"
            @dragleave.prevent="onDragLeave"
            class="flex flex-col flex-1 px-4 overflow-hiden" 
            :class="dragOver ? 'dropzone' : ''">

          <template v-if="dragOver" class="text-gray-500 text-center py-8 text-sm">
              Faites un glissé déposé ici...!
          </template>
          <template v-else>
              <div class="flex items-center justify-between">
                <Menu as="div" class="text-left mx-2 my-2">
      <div>
          <MenuButton  v-if="mobileView"
            class="inline-flex w-[140px] left-1 justify-center rounded-md bg-black/20 px-2 py-3 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
          >
          <div id="navigation-icon" v-if="mobileView" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
          </svg>
          </div>
      
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
            class="absolute  w-[240px] mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
          >
            <div class="mt-3 space-y-1 ">
              <MenuItem>
              
                <NavigationMobile v-if="mobileView"/>
              </MenuItem>
            </div>
        </MenuItems>
      </transition>
  </Menu>
                  <SearchForm/>
                  <UserSettingsDropdown/>
              </div>
              <div class="flex-1 flex flex-col overflow-hiden ">
                  <slot/>
              </div>
            
          </template>
      </main>
  </div>

  <ErrorDialog />
  <FormProgress :form="fileUploadForm"/>
  <Notification />
  </div>
</template>

<script setup>

// Imports
import Navigation from "@/Components/app/Navigation.vue";
import SearchForm from "@/Components/app/SearchForm.vue";
import UserSettingsDropdown from "@/Components/app/UserSettingsDropdown.vue";
import {onMounted, ref} from "vue";
import {emitter, FILE_UPLOAD_STARTED, showErrorDialog, showSucessNotification} from "@/event-bus.js";
import {useForm, usePage} from "@inertiajs/vue3";
import FormProgress from "@/Components/app/FormProgress.vue";
import ErrorDialog from "@/Components/app/ErrorDialog.vue";
import Notification from "@/Components/Notification.vue";
import NavigationMobile from "@/Components/app/NavigationMobile.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'


// Uses
const page = usePage();
const fileUploadForm = useForm({
  files: [],
  relative_paths: [],
  parent_id: null
})

var mobileView = true;

if(window.innerWidth >= 750){
  mobileView = false;
}

// ce code n'est activable que si l'on souhaite utilisé la responsivité avec 
//un set up à notre balise script
// export default {
//   data: ()=>{
//     return {
//       mobileView: true,
//       navlink: true
//     };
//   },
//   methods:{
//     handleView(){
//       this.mobileView = window.innerWidth <= 750;

//     }
//   },
//   components:{
//     Navigation,
//     SearchForm,
//     UserSettingsDropdown,
//     ErrorDialog,
//     NavigationMobile,
//     ResponsiveNavLink,
//     Menu,
//     MenuButton,
//     MenuItem,
//     MenuItems,onMounted, ref,
//     useForm, usePage,
//     emitter, FILE_UPLOAD_STARTED, showErrorDialog, showSucessNotification,
//   },
//   created(){
//     this.handleView();
//     console.log(this.mobileView);
//   }
 
// }

// function mobileView(){
  
//     return {
//       mobileView: true,
//     }
  
 
// }
// function boo(){

//  this.mobileView = window.innerWidth <= 990;

// }
// function created(){
//   this.boo();
// }



// Refs
const dragOver = ref(false)

// Props & Emit

// Computed


// Methods
function onDragOver() {
  dragOver.value = true
}

function onDragLeave() {
  dragOver.value = false
}

function handleDrop(ev) {
  dragOver.value = false;
  const files = ev.dataTransfer.files
  if (!files.length) {
      return
  }

  uploadFiles(files)
}

function uploadFiles(files) {
  console.log(files);

  fileUploadForm.parent_id = page.props.folder.id
  fileUploadForm.files = files
  fileUploadForm.relative_paths = [...files].map(f => f.webkitRelativePath);

  fileUploadForm.post(route('file.store'), {
      onSuccess: () => {
        showSucessNotification(`${files.length} fichiers ont été téléchargés`)
      },
      onError: errors => {
          let message = '';

          if (Object.keys(errors).length > 0) {
              message = errors[Object.keys(errors)[0]]
          } else {
              message = 'Erreur lors du téléchargement du fichier. Veuillez réessayer plus tard.'
          }
          showErrorDialog(message)
      },
      onFinish: () => {
          fileUploadForm.clearErrors()
          fileUploadForm.reset();
      }
  })
}

// Hooks
onMounted(() => {
  emitter.on(FILE_UPLOAD_STARTED, uploadFiles)
})

</script>

<style scoped>


  .dropzone {
      width: 100%;
      height: 100%;
      color: #8d8d8d;
      border: 2px dashed gray;
      display: flex;
      justify-content: center;
      align-items: center;
  }
  *::-webkit-scrollbar {
    scrollbar-width: none;
}

*::-webkit-scrollbar-track {
  background: orange;

}

*::-webkit-scrollbar-thumb {
  background-color: blue;
  border-radius: 20px;
  border: 3px solid orange;
  
}
</style>
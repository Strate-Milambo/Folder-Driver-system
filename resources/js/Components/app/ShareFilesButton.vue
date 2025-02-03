<template>
  <button @click="onClick"
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white-900 bg-white border-dark-200
            rounded-lg hover:bg-white-100 hover:text-gray-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 
           dark:bg-green-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white mr-3">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5 mr-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
</svg>


       Share
   </button>
   <ShareFilesModal v-model="showEmailsModal" :all-selected="allSelected" :selected-ids="selectedIds"/>

</template>

<script setup>
//import
import { useForm, usePage } from "@inertiajs/vue3";
import {ref} from "vue";
import { showErrorDialog, showSucessNotification } from "@/event-bus";
import ShareFilesModal from "./ShareFilesModal.vue";

//uses
const page = usePage();
const form= useForm({
 all: null,
 ids: [],
 parent_id: null
})

//methods
function onClick(){
 if(!props.allSelected && !props.selectedIds.length){
   showErrorDialog('Veuillez sélectionner au moins un fichier ou dossier à partager')
   return
 }
 showEmailsModal.value=true;
}

// function onCancel(){
 
//  showEmailsModal.value= false;
// }
// function onConfirm(){

//  if(props.allSelected){
//    form.all = true
//  }else{
//    form.ids = props.selectedIds
//  }

//  form.post (route('file.restore'),{
//    onSuccess: ()=>{
//      showEmailsModal.value=false
//      emit('restore')
//      showSucessNotification('selected files have been restored')
//    }
//  })
// }

//refs
const showEmailsModal = ref(false)


//props & emit
const props = defineProps({
 allSelected: {
   type: Boolean,
   requied: false,
   default: false
 },
 selectedIds: {
   type: Array,
   required: false
 }
})

const emit=defineEmits(['restore'])
</script>

<style lang="scss" scoped></style>
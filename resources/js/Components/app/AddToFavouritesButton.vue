<template>
  <button @click="onClick"
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white-900 bg-white border-dark-200
            rounded-lg hover:bg-white-100 hover:text-gray-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 
           dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white mr-2">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
</svg>


       Add To Favorite
   </button>
</template>

<script setup>
//import
import { useForm, usePage } from "@inertiajs/vue3";
import { showErrorDialog, showSucessNotification } from "@/event-bus";

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
   showErrorDialog('please select at least one file')
   return
 }
form.parent_id = page.props.folder.id
 if(props.allSelected){
   form.all = true
 }else{
   form.ids = props.selectedIds
 }

 form.post (route('file.addToFavourites'),{

   onSuccess: ()=>{
    form.ids =[];
     showConfirmationDialog.value=false
     showSucessNotification('selected files have been added to favourites')
   }
 })
}




//refs



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

</script>

<style lang="scss" scoped></style>
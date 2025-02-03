<template>
  
  <AuthenticatedLayout>
    <nav class="flex items-center justify-between p-1 mb-3">
   
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li v-for="ans of ancestors.data" :key="ans.id" class="inline-flex items-center">
          <Link
            v-if="!ans.parent_id"
            :href="route('myFiles')"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-black"
          >
            <HomeIcon class="w-4 h-4" />

            My Files
          </Link>
          <div v-else class="flex items-center">
            <svg
              aria-hidden="true"
              class="w-6 h-6 text-gray-400"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <Link
              :href="route('myFiles', { folder: ans.path })"
              class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-black"
            >
              {{ ans.name }}
            </Link>
          </div>
        </li>
        
      </ol>
      <div >
      
        
      <select class="form-select text-secondary form-select-lg mb-2 mx-2 w-25 h-9" aria-label=".form-select-lg example" >
      
        <option selected>Coworkers</option>
       
        <option v-for="user of coWorkers.data " :key="user.id">{{user.email }}</option>
      </select>
        
        <ShareFilesButton  :all-selected="allSelected" :selected-ids="selectedIds"  class="mr-3 h-4 mb-2" />
        <!-- <AddToFavouritesButton :all-selected="allSelected" :selected-ids="selectedIds"/> -->
        <DownloadFilesButton  :all="allSelected" :ids="selectedIds" class="mr-3 h-9 mb-2"/>
        <DeleteFilesButton  :delete-all="allselected" :delete-ids="selectedIds" @delete="onDelete"/>
      </div>
    </nav>
    <div class="table-responsive scrollbar">
    <div class="flex h-screen overflow-auto  table-responsive-lg" responsiveLayourt="scroll" >
 
      <table class="min-w-full">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left w-[30px] max-w-[30px] pr-0">
              <Checkbox @change="onSelectedAllChange" v-model:checked="allselected"/>
            </th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
            <th v-if="search" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">path</th>
            <!-- <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Owner</th> -->
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
              Last Modified
            </th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Size</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="file of allFiles.data"
            :key="file.id"
            @click="$event => toggleFileSelect(file)"
            @dblclick="openFolder(file)"
            class="border-b transition duration-300 ease-in-out hover:bg-blue-100 cursor-pointer"
            :class="(selected[file.id]|| allselected) ? 'bg-blue-50' : 'bg-white' "
          >
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 w-[30px] max-w-[30px] pr-0">
               <Checkbox  @change="$event => onSelectCheckboxChange(file)" v-model="selected[file.id]" :checked="selected[file.id] || allselected" />
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-yellow-500">
              
              <div @click.stop.prevent="addRemoveFavourite(file)">
                    <svg v-if="!file.is_favourite" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                  </svg>
                  <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
                  <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                </svg>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              <FileIcon :file="file" />
              
              {{ short(file.name) }}
            </td>
            <td  v-if="search" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ file.name }}
              
            </td>
            <!-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ file.owner }}
            </td> -->
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ file.updated_at }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{!(file.is_folder)  ? file.size : '' }}
            </td>
           
          </tr>
         
        </tbody>

          <div v-if="allFiles.data.length==false" class="w-[600px] h-300px text-gray-500  py-10 text-center ">
            Il n’y a aucun fichier ou dossier dans cette hiérarchie ⛔
          </div>
  
          <div ref="loadMoreIntersect"></div>
      </table>
    
    </div>
    </div>
 
   
  </AuthenticatedLayout>
</template>

<script setup>
import { HomeIcon } from "@heroicons/vue/20/solid";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { router, useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import FileIcon from "@/Components/app/FileIcon.vue";
import DeleteFilesButton from "@/Components/app/DeleteFilesButton.vue";
import Checkbox from "@/Components/Checkbox.vue"; 
import {computed, onMounted, ref , onUpdated} from "vue";
import {httpGet, httpPost} from "@/Helper/http-helper.js";
import DownloadFilesButton from "@/Components/app/DownloadFilesButton.vue";
import { ON_SEARCH, emitter, showSucessNotification } from "@/event-bus";
import ShareFilesButton from "@/Components/app/ShareFilesButton.vue";
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue';


//import

//use

//refs
const loadMoreIntersect = ref(null);
const selected = ref({});
const allselected = ref(false)
const onlyFavourites = ref(false)
let params = null;


//props & emit
const props = defineProps({
  files: Object,
  folder: Object,
  ancestors: Object,
  coWorkers: Object,

});

const allFiles = ref({
  data: props.files.data,
  next: props.files.links.next
})

let search = ref('search')

//computed
const selectedIds= computed(()=>Object.entries(selected.value).filter(a=>a[1]).map(a=>a[0]))

//Methods

function openFolder(file) {
  if (!file.is_folder) {
    return;
  }

  router.visit(route("myFiles", { folder: file.path }));
}

function loadMore(){
  console.log("loadMore");
  console.log(allFiles.value.next);

  if(allFiles.value.next === null){
    return
  }
  httpGet(allFiles.value.next)
    .then( res =>{
        allFiles.value.data=[...allFiles.value.data, ...res.data]
        allFiles.value.next = res.links.next
    })
}

function onSelectedAllChange(){
  allFiles.value.data.forEach(f=>{
    selected.value[f.id] = allselected.value
  })
}

function toggleFileSelect(file){
  selected.value[file.id] = !selected.value[file.id]
  onSelectCheckboxChange(file)
}

function onSelectCheckboxChange(file){
    
  if(selected.value[file.id]){
    allselected.value=false;
  }else{
    let checked = true;

    for(let file of allFiles.value.data){
        if(!selected.value[file.id]){
          checked = false;
          break;
        }
    }
    allselected.value = checked;
  }
}

function onDelete(){
  allselected.value=false
  selected.value = {}
}

function addRemoveFavourite(file) {
httpPost(route('file.addToFavourites'),{id: file.id})
    .then(() => {
        file.is_favourite = !file.is_favourite
        if(file.is_favourite){ 
        showSucessNotification('Les fichiers sélectionnés ont été ajoutés aux favoris')
        }else{
          showSucessNotification('Les fichiers sélectionnés ont été supprimés des favoris')

        }
    })
    .catch(async (er) => {
        console.log(er);
    })
}

function showOnlyFavourites()
{
  httpGet(route('/coWorkers'))
}
//hooks

onUpdated(() => {
  allFiles.value={
    data: props.files.data,
    next: props.files.links.next
  }
})


onMounted( ()=>{
    params = new URLSearchParams(window.location.search)

    onlyFavourites.value = params.get('favourites') == '1'
    search.value = params.get('search')
    emitter.on(ON_SEARCH, (value)=>{
      search.value = value
    })

    const observer = new IntersectionObserver((entries) => entries.forEach(entry => entry.isIntersecting && loadMore()), {
        rootMargin: '-255px 0px 0px 0px'
    })

    observer.observe(loadMoreIntersect.value)
})

function short(f){
  if(f.length >= 10){ 
   f = f.slice(0,20) + "...";
  }
  return f;
}
</script>
<style>
::-webkit-scrollbar {
display: none;
}

*::-webkit-scrollbar-track {
  overflow: scroll;
  
}

*::-webkit-scrollbar-thumb {

  background-color: blue;
  border-radius: 20px;
  border: 1px solid rgb(20, 70, 150);

 
} 


</style>

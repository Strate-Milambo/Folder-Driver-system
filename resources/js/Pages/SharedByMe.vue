<template>
  <AuthenticatedLayout>
 
    <nav class="flex items-center justify-end p-1 mb-3">
      <div >
        <DownloadFilesButton :all="allSelected" :ids="selectedIds" class="mr-3 h-9 mb-2" :shared-by-me='true' />

       </div>
    </nav>
    <div class="flex h-screen overflow-auto">
 
      <table class="min-w-full">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left w-[30px] max-w-[30px] pr-0">
              <Checkbox @change="onSelectedAllChange" v-model:checked="allselected"/>
            </th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
               Name
            </th>
            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                path
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="file of allFiles.data"
            :key="file.id"
            @click="$event => toggleFileSelect(file)"
            class="border-b transition duration-300 ease-in-out hover:bg-blue-100 cursor-pointer"
            :class="(selected[file.id]|| allselected) ? 'bg-blue-50' : 'bg-white' "
          >
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 w-[30px] max-w-[30px] pr-0">
               <Checkbox  @change="$event => onSelectCheckboxChange(file)" v-model="selected[file.id]" :checked="selected[file.id] || allselected" />
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              <FileIcon :file="file" />
              {{ file.name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ file.path }}
            </td>
          </tr>
        </tbody>
        <div v-if="!allFiles.data.length" class="w-[600px] h-300px text-gray-500  py-10 text-center">
            There is no files in this content ⛔
        </div>
        <div ref="loadMoreIntersect"></div>
      </table>
      
    </div>
  </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import FileIcon from "@/Components/app/FileIcon.vue";
import Checkbox from "@/Components/Checkbox.vue"; 
import {computed, onMounted, ref , onUpdated} from "vue";
import {httpGet} from "@/Helper/http-helper.js";
import RestoreFilesButton from "@/Components/app/RestoreFilesButton.vue";
import DeleteForeverButton from "@/Components/app/DeleteForeverButton.vue";
import DownloadFilesButton from "@/Components/app/DownloadFilesButton.vue";

//import

//use

//refs
const loadMoreIntersect = ref(null);
const selected = ref({});
const allselected = ref(false)

//props & emit
const props = defineProps({
  files: Object,
  folder: Object,
  ancestors: Object,
});

const allFiles = ref({
  data: props.files.data,
  next: props.files.links.next
})

//computed
const selectedIds= computed(()=>Object.entries(selected.value).filter(a=>a[1]).map(a=>a[0]))

//Methods

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
function resetForm(){
  allselected.value=false
  selected.value = {}
}
//hooks

onUpdated(() => {
  allFiles.value={
    data: props.files.data,
    next: props.files.links.next
  }
})


onMounted( ()=>{
    const observer = new IntersectionObserver((entries) => entries.forEach(entry => entry.isIntersecting && loadMore()), {
        rootMargin: '-255px 0px 0px 0px'
    })

    observer.observe(loadMoreIntersect.value)
})


</script>

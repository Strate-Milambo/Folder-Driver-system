<template>
    <div class="w-[600px] h-[80px]  flex items-center responsive">
        <TextInput type="text" 
                    class="block w-full mr-2"
                    v-model="search"
                    autocomplete
                    @keyup.enter.prevent="onSearch"
                    placeholder='Search for files and Folders'
        />
    </div>
</template>

<script setup>
//import
import TextInput from '../TextInput.vue';
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import { ON_SEARCH, emitter } from '@/event-bus';

//use


//refs
let params = ''
const search= ref('')

//methods
function onSearch()
{
    const params = new URLSearchParams(window.location.search)
    params.set('search', search.value)
    router.get(window.location.pathname +'?'+ params.toString())

    emitter.emit(ON_SEARCH,search.value)
}
//hooks
onMounted(()=>{
    params = new URLSearchParams(window.location.search)
    search.value = params.get('search')
})

</script>
<template>
  <Modal :show="modelValue" @show="onShow" max-width="sm">
    <div class="p-6">
      <h2 class="text-lg font-medium text-gray-900">
          Create New Folder
      </h2>
      <div class="mt-6">
        <InputLabel for="folderName" value="Folder Name" class="sr-only"/>
        <TextInput type="text"
                    ref="folderNameInput"
                    id="folderName" v-model="form.name"
                    class="mt-1 block w-full"
                    :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' "
                    placeholder="Folder Name"
                    @keyup.enter="createFolder"        
        />
        <InputError class="mt-2" :message="form.errors.name"/>
      </div>
      <div class="mt-6 flex justify-end">
        <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
        <PrimaryButton class="ml-3" 
            :class="{ 'opacity-25': form.processing }"
           @click="createFolder" :disable="form.processing">
          Submit
        </PrimaryButton>
      </div>
      
    </div>
  </modal>
</template>

<script setup>

//import
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import InputError from '../InputError.vue';
import InputLabel from '../InputLabel.vue';
import Modal from '../Modal.vue';
import TextInput from '../TextInput.vue';
import SecondaryButton from '../SecondaryButton.vue';
import PrimaryButton from '../PrimaryButton.vue';
import { nextTick } from 'vue';
import { ref } from 'vue';
import { showSucessNotification } from '@/event-bus';


//uses
const form = useForm({
 
  name: '',
  parent_id: null
  
})

//refs
const folderNameInput = ref(null)


// props & Emit
const {modelValue} = defineProps({
  modelValue: Boolean
});
const emit = defineEmits(['update:modelValue'])
const page = usePage();

//Methods
function onShow()
{
  nextTick(()=>folderNameInput.value.focus())
}
//test for submit button after emit any info
// function createFolder()
// {
//   console.log("create folder");
// }
function closeModal()
{
  emit('update:modelValue')
  form.clearErrors()
  form.reset()
}


//sending request for creating folder
function createFolder()
{
  form.parent_id = page.props.folder.id
  const name = form.name
  form.post(route('folder.create'),{
    preserveScroll: true,
    onSuccess: () =>{
      closeModal()
      showSucessNotification(`The folder "${name}" was created`)
      form.reset();
     
    },
    onError: () => folderNameInput.value.focus()
  });
}
</script>

<style lang="scss" scoped></style>
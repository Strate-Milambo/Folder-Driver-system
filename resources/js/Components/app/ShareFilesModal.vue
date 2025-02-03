<template>
  
  <Modal :show="props.modelValue" @show="onShow" max-width="sm">
    <div class="p-6">
      <h2 class="text-lg font-medium text-gray-900">
          Share files
      </h2>
      <span v-if="!form.wasSuccessful" class="text-small font-small fw-bold text-blue-800">
          {{ form.message }}
        </span>
      <div class="mt-6">
      {{ files }}
      
        <InputLabel for="shareEmail" value="Enter Email Adress" class="sr-only"/>
        <TextInput type="text"
                    ref="emailInput"
                    id="shareEmail"
                    v-model="form.email"
                    :class="form.errors.email ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' "
                    class="mt-1 block w-full"
                    placeholder="Enter Email Address"
                    @keyup.enter="share"        
        />
        
        <InputLabel for="codeUser" value="Enter the code " class="sr-only"/>
        <TextInput type="text"
                    ref="codeInput"
                    id="codeUser"
                    v-model="form.code"
                    :class="form.errors.code ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' "
                    class="mt-1 block w-full"
                    placeholder="Enter the code"
                    @keyup.enter="share"        
        />
        
        <InputError class="mt-2" :message="form.errors.email"/>
        
        <InputError class="mt-2" :message="form.errors.code"/>
      </div>
      <div class="mt-6 flex justify-end">
        <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
        <PrimaryButton class="ml-3" 
            :class="{ 'opacity-25': form.processing }"
           @click="share" :disable="form.processing">
          Submit
        </PrimaryButton>
        {{  }}
        
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


//essaie



//uses
const form = useForm({
 
  email: null,
  code: null,
  all: false,
  parent_id: null,
  ids: [],
  message: "Rassurez-vous de saisir les identifiants corrects😊",
  
})

//refs
const emailInput = ref(null)
const codeInput = ref(null)


// props & Emit
const props = defineProps({
  message: String,
  modelValue: Boolean,
  allSelected: Boolean,
  selectedIds: Array,
  
});
const emit = defineEmits(['update:modelValue'])
const page = usePage();

//Methods
function onShow()
{
  nextTick(()=>emailInput.value.focus())
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
function share() 
{
  form.parent_id = page.props.folder.id
  console.log(props.selectedIds);
  if(props.allSelected){
    form.all=true;
    form.ids=[];

  }else{
    form.ids = props.selectedIds
  }


  const email = form.email
  const code = form.code


  form.post(route('file.share'),{
    
    
    preserveScroll: true,
    onSuccess: () =>{
      closeModal()
      form.reset();
     
      // show success notification
      showSucessNotification(`Les contenus selectionnés ont été envoyé chez  "${email}" si bien-sùr vous êtes en collaboration`)
    },
    onError: () =>{
      emailInput.value.focus(),
      codeInput.value.focus();
      let messages ="invalid";

    },
  });
}

</script>

<style lang="scss" scoped></style>
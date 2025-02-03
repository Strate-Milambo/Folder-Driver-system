<template>
  <Modal :show="show" max-with="md">
    <div class="p-6">
      <h2 class="text-2xl mb-2 text-red-600 font-semibold">
        Error <br />
        <i class="w-20 text-gray-500 text-sm w-50">
        The {{ message }} , get it
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-6 h-6"
          >
            <path
              fill-rule="evenodd"
              d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-2.625 6c-.54 0-.828.419-.936.634a1.96 1.96 0 0 0-.189.866c0 .298.059.605.189.866.108.215.395.634.936.634.54 0 .828-.419.936-.634.13-.26.189-.568.189-.866 0-.298-.059-.605-.189-.866-.108-.215-.395-.634-.936-.634Zm4.314.634c.108-.215.395-.634.936-.634.54 0 .828.419.936.634.13.26.189.568.189.866 0 .298-.059.605-.189.866-.108.215-.395.634-.936.634-.54 0-.828-.419-.936-.634a1.96 1.96 0 0 1-.189-.866c0-.298.059-.605.189-.866Zm2.023 6.828a.75.75 0 1 0-1.06-1.06 3.75 3.75 0 0 1-5.304 0 .75.75 0 0 0-1.06 1.06 5.25 5.25 0 0 0 7.424 0Z"
              clip-rule="evenodd"
            />
          </svg>
        </i>
      </h2>
      <div class="mt-6 flex justify-end">
        <PrimaryButton @click="close"> OK </PrimaryButton>
      </div>
    </div>
  </Modal>
</template>

<script setup>
//import
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { onMounted, ref } from "vue";
import { emitter, SHOW_ERROR_DIALOG } from "@/event-bus.js";

// refs
const show = ref(false);
const message = ref("");

//props & emit
const emit = defineEmits(["close"]);

//methods

function close() {
  show.value = false;
  message.value = "";
}

// Hooks

onMounted(() => {
  emitter.on(SHOW_ERROR_DIALOG, ({ message: msg }) => {
    show.value = true;
    message.value = msg;
  });
});
</script>

<style lang="scss" scoped></style>

<template>
    <span class="w-6 h-6 inline-flex items-center justify-center mr-2">
         <img v-if="file.is_folder" class="max-w-full"  :src="`/images/icons/file-and-folder.png`">
        <template v-else>
            <img class="max-w-full" v-if="isImage(file)" :src="`/images/icons/image.png`">
            <img class="max-w-full" v-else-if="isPDF(file)" :src="`/images/icons/pdf.png`">
            <img class="max-w-full" v-else-if="isAudio(file)" :src="`/images/icons/les-ondes-sonores.png`">
            <img class="max-w-full" v-else-if="isVideo(file)" :src="`/images/icons/chat-video.png`">
            <img class="max-w-full" v-else-if="isWord(file)" :src="`/images/icons/mot.png`">
            <img class="max-w-full" v-else-if="isExcel(file)" :src="`/images/icons/exceller.png`">
            <img class="max-w-full" v-else-if="isZip(file)" :src="`/images/icons/zip-francais.png`">
            <img class="max-w-full" v-else-if="isText(file)" :src="`/images/icons/texte.png`">
            <img class="max-w-full" v-else :src="`/images/icons/attachement.png`">
        </template>
    </span>

</template>

<script setup>
// Imports
import {isAudio, isExcel, isImage, isPDF, isText, isVideo, isWord, isZip} from "@/Helper/file-helper.js";

// Uses

// Refs

// Props & Emit

const {file} = defineProps({
   file: Object
})

// Computed

// Methods

// Hooks

</script>


<style scoped>

</style>
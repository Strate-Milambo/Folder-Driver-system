<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>
<style>
#k{
    background-color: rgb(203, 207, 240);
    
}
</style>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-2 sm:pt-0 bg-blue-100">
        <div>
            <a  :href="route('page.welcome')">
                <ApplicationLogo class="w-20  fill-current text-gray-500" />
            </a>
           
        </div>

        <div
            class="w-full sm:max-w-md  px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" id="k"
        >
            <slot />
        </div>
    </div>
</template>

<template>
    <Menu as="div" class="relative inline-block text-left">
      <div>
        <MenuButton
          class="inline-flex w-full justify-center rounded-md bg-blue-400 px-4 py-2 font-medium text-white hover:bg-blue-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
        >
        {{ $page.props.auth.user.name }}
          <ChevronDownIcon
            class="-mr-1 ml-2 h-5 w-5 text-violet-200 hover:text-violet-100"
            aria-hidden="true"
          />
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
        </svg>
        </MenuButton>
      </div>

      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="absolute right-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
        >
    
          <div class="mt-3 space-y-1">
            <MenuItem v-slot="{ active }">
             
             <a :href="route('profile')"
                :class="[
                    active ? 'bg-blue-500 text-white' : 'text-gray-900',
                    'group flex w-full items-center  px-2 py-2 text-sm',
                  ]"
                >
               Profile 
               </a>
             
            </MenuItem>
            <MenuItem v-slot="{ active }">
             
             <a :href="route('profile')"
                :class="[
                    active ? 'bg-blue-500 text-white' : 'text-gray-900',
                    'group flex w-full items-center  px-2 py-2 text-sm',
                  ]"
                >
               Settings
               
               </a>
             
            </MenuItem>
            <!-- <MenuItem v-slot="{ active }">
            

              <Link :href="route('logout')" as="button" method="post" name="logout"  :class="[
                  active ? 'bg-violet-500 text-white' : 'text-gray-900',
                  'group flex w-full items-center  px-2 py-2 text-sm',
                ]">
                Log Out
              </Link>
              
              
            </MenuItem> -->
            
      
           
          </div>
        </MenuItems>
      </transition>
    </Menu>
</template>

<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import ResponsiveNavLink from '../ResponsiveNavLink.vue';
import { Link, useForm } from '@inertiajs/vue3'
import PrimaryButton from '@/Components/PrimaryButton.vue';
const form = useForm({
    logout: false,
});

const submit = () => {
    form.post(route('logout'));
};


</script>
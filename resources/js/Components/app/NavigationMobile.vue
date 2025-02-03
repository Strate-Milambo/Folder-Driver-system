<template>
  <nav class="min-w-[40px] bg-blue-400">
      <div >
          <Link :href="route('myFiles')" class="h-[170px] w-[170px]  flex items-center gap-3">
            
              <ApplicationLogo
                  class="block h-8 w-auto fill-current text-gray-800"
              />
             
          </Link>
         
      </div>
      <div class="px-3 ">
          <!-- <pre>{{ $page.props.route_name }}</pre> -->
          <CreateNewDropdown />
          <hr class="text-bold mt-2">
                <hr>
            <span class="text-blue-600">Dashboard</span>
          <div class="py-3 w-[200px]">
   
              <NavLink :href="route('myFiles')" :active="$page.props.route_name == 'myFiles'">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder2-open mx-1 text-yellow-500" viewBox="0 0 16 16">
                  <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7z"/>
                  </svg>
              
              My Files
              </NavLink>
              <NavLink :href="route('file.sharedWithMe')" :active="$page.props.route_name == 'file.sharedWithMe'">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-down mx-1 text-teal-500" viewBox="0 0 16 16">
                  <path d="M12.5 9a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7m.354 5.854 1.5-1.5a.5.5 0 0 0-.708-.708l-.646.647V10.5a.5.5 0 0 0-1 0v2.793l-.646-.647a.5.5 0 0 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                  <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                  </svg>
              Shared with me
              </NavLink>
              <NavLink :href="route('file.sharedByMe')" :active="$page.props.route_name== 'file.sharedByMe'">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-up mx-1 text-teal-500" viewBox="0 0 16 16">
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                  <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                  </svg>
              
              Shared by me
              </NavLink>
              <NavLink :href="route('file.favourites')" :active="$page.props.route_name== 'file.favourites'">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart mx-1 text-green-500" viewBox="0 0 16 16">
                  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
              
              Starred
              </NavLink>
              <NavLink :href="route('trash')" :active="$page.props.route_name == 'trash'" class="mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash mx-1 text-red-500" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                  </svg>
              Trash
              </NavLink>
              <hr class="text-bold">
                <hr>
            <span class="text-blue-600">App</span>
              <!-- <NavLink :href="route('page.users')" :active="$page.props.route_name == 'page.users'" >Users</NavLink> -->
              <a :href="route('page.users')" class="flex items-center px-2 py-2  border-transparent text-white font-medium leading-5 text-gray-700 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                  :active="$page.props.route_name == 'page.users'">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people mx-1 text-gray-500" viewBox="0 0 16 16">
                      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                  </svg>
              Home Pages
              </a>
             
              <a :href="route('page.help')" class="flex items-center px-2 py-2  border-transparent text-white font-medium leading-5 text-gray-700 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out" 
                  :active="$page.props.route_name == 'page.help'" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle mx-1 text-blue-500" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                      <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
        </svg>
                  F.A.Q
              </a>
          </div>
   
      </div>
  </nav>
</template>
<
<script setup>

//import
  import { Link } from '@inertiajs/vue3';
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
  import CreateNewDropdown from '@/Components/app/CreateNewDropdown.vue'
  import NavLink from '../NavLink.vue';
</script> 
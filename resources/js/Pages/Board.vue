<template>
    <div class="flex flex-col h-screen bg-indigo-500">
        <header class="shrink-0 flex justify-between bg-white px-4 py-3">
            <a href="#" class="text-2xl font-black tracking-tight">kanboard</a>
            <nav>
                <a href="#" class="text-sm font-medium px-3 py-2 rounded-md hover:bg-gray-100">My board</a>
                <button class="ml-3">
                    <img class="h-9 w-9 inline rounded-full" src="https://pbs.twimg.com/profile_images/1333896976602193922/MtWztkxt_400x400.jpg" alt="">
                </button>
            </nav>
        </header>
        <main class="flex-1 overflow-hidden">
           <div class="flex flex-col h-full">
                <div class="shrink-0 flex justify-between items-center p-4">
                    <h1 class="text-2xl text-white font-bold">Board title</h1>
                   <div>
                       <button class="flex items-center bg-white/10 hover:bg-white/20 px-3 py-2 font-medium rounded-md text-white">
                           <DotHorizontalIcon class="w-5 h-5" />
                           <span class="ml-1">Settings</span>
                       </button>
                   </div>
                </div>
               <div class="flex-1 overflow-x-auto">
                   <div class="inline-flex h-full items-start px-4 pb-4 space-x-4">
                        <div
                            v-for="item in Array.from({length: 10})"
                            class="w-72 bg-gray-200 max-h-full flex flex-col rounded-md">
                            <div class="flex items-center justify-between px-3 py-2">
                                <h3 class="text-sm font-semibold text-gray-700">Backlog</h3>
                                <button class="hover:bg-gray-300 w-8 h-8 rounded-md grid place-content-center">
                                    <DotHorizontalIcon class="w-5 h-5" />
                                </button>
                            </div>
                            <div class="pb-3 flex flex-col overflow-hidden">
                                <div class="px-3 flex-1 overflow-y-auto">
                                    <ul class="space-y-3">
                                        <li
                                            v-for="item in Array.from({length: 100})"
                                            class="group relative bg-white p-3 shadow rounded-md border-b border-gray-400  hover:bg-gray-50">
                                            <a href="#" class="text-sm">
                                                card items
                                            </a>
                                            <button class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 group-hover:grid place-content-center rounded-md text-gray-600 hover:text-black hover:bg-gray-200">
                                                <PencilIcon class="w-5 h-5" />
                                            </button>
                                        </li>
                                        <li class="group relative bg-white p-3 shadow rounded-md border-b border-gray-400  hover:bg-gray-50">
                                            <a href="#" class="text-sm">
                                                card items
                                            </a>
                                            <button class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 group-hover:grid place-content-center rounded-md text-gray-600 hover:text-black hover:bg-gray-200">
                                                <PencilIcon class="w-5 h-5" />
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="px-3 mt-3">
                                    <button class="flex w-full items-center p-2 text-sm
                                font-medium
                                hover:text-black
                                hover:bg-gray-300
                                rounded-md
                                text-gray-600">
                                        <PlusIcon class="w-5 h-5" />
                                        <span>Add card</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                       <div class="w-72">
                           <button class="flex items-center bg-white/10 w-full
                           text-white
                           p-2
                           font-medium
                           rounded-md
                           hover:bg-white/20">
                               <PlusIcon class="h-5 w-5" />
                               <span class="ml-1">Add another list</span>
                           </button>
                       </div>
                   </div>
               </div>
           </div>
        </main>
    </div>
</template>

<script setup>

import DotHorizontalIcon from "../Components/DotHorizontalIcon.vue";
import PencilIcon from "@/Components/PencilIcon.vue";
import PlusIcon from "@/Components/PlusIcon.vue";
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Board" />
           <div class="flex flex-col h-full bg-indigo-500">
                <div class="shrink-0 flex flex-wrap justify-between items-center p-4">
                    <BoardNameForm :board="board" />
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
                                <Menu as="div" class="relative z-10">
                                    <MenuButton class="hover:bg-gray-300 w-8 h-8 rounded-md grid place-content-center">
                                        <DotHorizontalIcon class="w-5 h-5"/>
                                    </MenuButton>

                                    <transition
                                        enter-active-class="transition transform duration-100 ease-out"
                                        enter-from-class="opacity-0 scale-90"
                                        enter-to-class="opacity-100 scale-100"
                                        leave-active-class="transition transform duration-100 ease-in"
                                        leave-from-class="opacity-100 scale-100"
                                        leave-to-class="opacity-0 scale-90"
                                    >
                                        <MenuItems class="origin-top-left mt-2 focus:outline-none absolute left-0 bg-white overflow-hidden rounded-md shadow-lg border w-40">
                                            <MenuItem v-slot="{active}">
                                                <a href="#" :class="{'bg-gray-100': active}" class="block px-4 py-2 text-sm text-gray-700">Add card</a>
                                            </MenuItem>
                                            <MenuItem v-slot="{active}">
                                                <a href="#" :class="{'bg-gray-100': active}" class="block px-4 py-2 text-sm text-red-600">Delete list</a>
                                            </MenuItem>
                                        </MenuItems>
                                    </transition>
                                </Menu>
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
    </AuthenticatedLayout>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import DotHorizontalIcon from "../Components/DotHorizontalIcon.vue";
import PencilIcon from "@/Components/PencilIcon.vue";
import PlusIcon from "@/Components/PlusIcon.vue";
import BoardNameForm from "@/Components/BoardNameForm.vue";
const props = defineProps({
    board: Object
})


</script>

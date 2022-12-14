<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, InertiaLink, useForm} from '@inertiajs/inertia-vue3';
import PlusIcon from "@/Components/PlusIcon.vue";
import { Popover, PopoverButton, PopoverPanel, PopoverOverlay } from '@headlessui/vue';
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
const props = defineProps({
    boards: Array
});

const form = useForm({
    name: ''
})

function onSubmit(closePopover) {
    form.post(route('boards.store'), {
        onSuccess: () => {
            closePopover();
            form.reset()
        }
    });
}
</script>

<template>
    <Head title="Boards" />

    <AuthenticatedLayout>
        <div class="h-full bg-gray-50 px-4 py-6 overflow-y-auto">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center mb-4">
                    <h3 class="px-3 font-black text-gray-700">My boards</h3>
                    <Popover v-slot="{ open }" class="relative">
                        <PopoverButton
                            :class="open ? ' bg-indigo-50 text-indigo-600' : ''"
                            class="flex
                            focus:outline-0
                    items-center
                    py-2
                    px-3
                    bg-gray-100
                    rounded
                    font-medium
                    ml-4
                    hover:bg-gray-200"
                        >
                            <PlusIcon class="-ml-1 w-4 h-4" />
                            <span class="ml-1">Create board</span>
                        </PopoverButton>
                        <PopoverOverlay class="z-10 fixed inset-0 bg-black opacity-30" />

                        <transition
                            enter-active-class="transition duration-200 ease-out"
                            enter-from-class="translate-y-1 opacity-0"
                            enter-to-class="translate-y-0 opacity-100"
                            leave-active-class="transition duration-150 ease-in"
                            leave-from-class="translate-y-0 opacity-100"
                            leave-to-class="translate-y-1 opacity-0"
                        >
                            <PopoverPanel
                                :focus="true"
                                v-slot="{close}"
                                class="absolute w-72 z-10 mt-3 max-w-sm transform px-4 sm:px-0 "
                            >
                                <div
                                    class="p-4 bg-white overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                                >
                                    <form @submit.prevent="onSubmit(close)">
                                        <label
                                            class="block text-sm text-gray-600 font-medium mb-1"
                                            for="name">Your new board</label>
                                        <input
                                            v-model="form.name"
                                            class="block w-full text-sm rounded-md
                                            shadow-sm
                                            mb-1
                                            focus:border-indigo-400
                                            focus:ring-indigo-400
                                            border-gray-300"
                                            type="text" name="name" id="name">
                                        <p
                                            v-if="form.errors.name"
                                            class="text-sm text-red-600">
                                            {{form.errors.name}}
                                        </p>
                                        <div class="flex justify-end mt-2">
                                            <button class="
                                                px-4
                                                py-2
                                                text-sm
                                                font-medium
                                                text-white
                                                bg-rose-600
                                                hover:bg-rose-500
                                                rounded-md
                                                shadow-sm
                                                focus:ring-2
                                                focus:ring-offset-2
                                                focus:ring-rose-500
                                                focus:outline-0
                                            ">
                                                Create board
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </PopoverPanel>
                        </transition>
                    </Popover>
                </div>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <li
                        v-for="board in boards"
                        :key="board.id"
                        class="relative bg-indigo-500 hover:bg-indigo-400
                    min-h-[7rem]
                    rounded-md">
                        <InertiaLink
                            class="
                            p-3
                            text-white
                            text-lg
                            font-bold
                            absolute
                            inset-0
                                  "
                            :href="route('boards.show', {board: board.id})">
                            {{ board.name }}
                        </InertiaLink>
                    </li>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

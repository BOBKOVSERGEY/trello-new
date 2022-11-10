<template>
    <div class="flex flex-col items-start max-w-full relative">
    <h1
        @click="edit"
        :class="[isEditing ? 'invisible' : '']"
        ref="heading"
        class="
        whitespace-pre
        w-full
        overflow-hidden
        text-ellipsis
        border
        border-transparent
        hover:bg-white/20 rounded-md
    px-3
    py-1.5
    text-2xl text-white font-bold">
        {{form.name ? form.name : ' '}}
    </h1>
    <form
        v-show="isEditing"
        @submit.prevent="onSubmit()"
        @focusout="onSubmit()"
        >
        <input
            ref="input"
            type="text"
               v-model="form.name"
               class="
               absolute
               inset-0
               text-2xl
               placeholder-gray-400
               placeholder-gray-400
               px-3
               max-w-full
               rounded-md
               focus:ring-2
               focus:ring-indigo-900
font-bold
"
               placeholder="Board name">
    </form>
    </div>
</template>

<script setup>
import {ref, watch, nextTick} from "vue";
import {useForm} from "@inertiajs/inertia-vue3";

const props = defineProps({
  board: Object
})
const form = useForm({
    name: props.board.name
})

const heading = ref();
const input = ref();
const isEditing = ref(false);

function resize()
{
    input.value.style.width = `${heading.value.offsetWidth + 2}px`;
}

watch(() => form.name, async () => {
    await nextTick();
    input.value.style.width = `${heading.value.offsetWidth + 2}px`;
    //resize();

})

async function edit()
{

    isEditing.value = true
    await nextTick();
    input.value.select();
    //resize();
}
function onSubmit()
{
    isEditing.value = false;
    form.put(route('boards.update', {
        board: props.board.id
    }), {
        onError: () => {
            form.reset()
        }
    })
}

</script>

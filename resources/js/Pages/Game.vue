<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
    description: String,
    left: Number,
    right: Number,
});

function submit() {
    Inertia.get(route('game'), { left: props.left, right: props.right });
}
</script>

<template>
    <Head title="Game!" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl">{{ description }}</h1>

            <form
                @submit.prevent="submit"
                class="pt-4"
            >
                <label for="left" class="block py-2">
                    Left:
                    <input id="left" v-model="left" required type="number" step="1" />
                </label>

                <label for="right" class="block py-2">
                    Right:
                    <input id="right" v-model="right" required type="number" step="1" />
                </label>

                <button type="submit" class="bg-blue-500 p-3">Submit</button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  description: {
    type: String,
    required: true,
  },
  isFinished: {
    type: Boolean,
    required: true,
  },
  left: {
    type: Number,
    required: true,
  },
  right: {
    type: Number,
    required: true,
  },
});

const form = useForm({
  left: props.left ?? 0,
  right: props.right ?? 0,
});

function submit() {
  form.post(route("game.store"));
}
</script>

<template>
  <Head title="Game!" />

  <div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center"
  >
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 dark:text-white">
      <h1 class="text-xl">
        {{ description }}
      </h1>

      <Link v-show="isFinished" :href="route('game')" class="underline">
        Reset
      </Link>

      <form v-show="!isFinished" class="pt-4" @submit.prevent="submit">
        <label for="left" class="block py-2">
          Left:
          <input
            id="left"
            v-model="form.left"
            type="number"
            step="1"
            required
            min="0"
            class="text-gray-900"
          />
          <button class="text-xl p-3" @click="form.left++">+</button>
        </label>
        <div v-if="form.errors.left">{{ form.errors.left }}</div>

        <label for="right" class="block py-2">
          Right:
          <input
            id="right"
            v-model="form.right"
            type="number"
            step="1"
            required
            min="0"
            class="text-gray-900"
          />
          <button class="text-xl p-3" @click="form.right++">+</button>
        </label>
        <div v-if="form.errors.right">{{ form.errors.right }}</div>

        <button type="submit" class="bg-blue-500 p-2">Submit</button>

        <button class="pl-2" type="reset">Reset</button>
      </form>
    </div>
  </div>
</template>

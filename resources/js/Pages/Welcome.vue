<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <Head title="Welcome" />

  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      <ul>
        <li>
          <Link
            :href="route('game')"
            class="underline"
          >
            Simple Game
          </Link>
        </li>
      </ul>
    </div>
  </div>
</template>

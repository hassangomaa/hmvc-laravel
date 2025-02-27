<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, usePoll } from "@inertiajs/vue3";

defineProps({
    items: Array,
});

usePoll(2000);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>

                <ul role="list" class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3">
                    <li v-for="item in items" :key="item.id" class="col-span-1 bg-white rounded-lg shadow-sm">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold leading-tight text-gray-800">
                                {{ item.name }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">
                                {{ item.description }}
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

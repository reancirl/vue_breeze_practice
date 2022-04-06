<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import BreezeButtonLink from "@/Components/ButtonLink.vue";
defineProps(["orders", "total"]);
</script>

<template>
    <Head title="Orders" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Orders
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-800 dark:bg-gray-700">
                                    <tr>
                                        <th
                                            class="py-3 px-6 text-xs font-medium text-left text-white uppercase dark:text-white"
                                        >
                                            ID
                                        </th>
                                        <th
                                            class="py-3 px-6 text-xs font-medium text-left text-white uppercase dark:text-white"
                                        >
                                            Product Name
                                        </th>
                                        <th
                                            class="py-3 px-6 text-xs font-medium text-left text-white uppercase dark:text-white"
                                        >
                                            Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600"
                                        v-for="order in orders"
                                        :key="order.id"
                                    >
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            {{ order.id }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            {{ order.product.name }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            {{ order.price }}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot
                                    class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600"
                                >
                                    <td
                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"
                                        colspan="3"
                                    >
                                        Total Price: {{ total }}
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

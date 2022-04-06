<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import BreezeButtonLink from "@/Components/ButtonLink.vue";
import { Inertia } from "@inertiajs/inertia";
defineProps(["products"]);
function productStatusUpdate(url) {
    Inertia.visit(url, { method: "patch" });
}
</script>

<template>
    <Head title="Products" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
                <BreezeButtonLink :href="route('products.create')" class="ml-4"
                    >Add Product</BreezeButtonLink
                >
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
                                            Name
                                        </th>
                                        <th
                                            class="py-3 px-6 text-xs font-medium text-left text-white uppercase dark:text-white"
                                        >
                                            Description
                                        </th>
                                        <th
                                            class="py-3 px-6 text-xs font-medium text-left text-white uppercase dark:text-white"
                                        >
                                            Price
                                        </th>
                                        <th
                                            class="py-3 px-6 text-xs font-medium text-center text-white uppercase dark:text-white"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600"
                                        v-for="product in products"
                                        :key="product.id"
                                    >
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            {{ product.name }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            {{ product.description }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            {{ product.price }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"
                                        >
                                            <span
                                                @click="
                                                    productStatusUpdate(
                                                        product.status_update_url
                                                    )
                                                "
                                                class="text-blue-600 dark:text-blue-500 hover:underline cursor-pointer"
                                            >
                                                {{ product.status }}
                                            </span>
                                            -
                                            <Link
                                                :href="product.edit_url"
                                                class="text-blue-600 dark:text-blue-500 hover:underline"
                                            >
                                                Edit
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

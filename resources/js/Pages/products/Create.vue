<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import BreezeButtonLink from "@/Components/ButtonLink.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

const form = useForm({
    name: "",
    description: "",
    quantity: "",
    price: "",
    status: "active",
});

const submit = () => {
    form.post(route("products.store"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Products" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Product
                <BreezeButtonLink :href="route('products.index')" class="ml-4"
                    >Go Back</BreezeButtonLink
                >
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <BreezeValidationErrors class="mb-4" />

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <BreezeLabel for="name" value="Name" />
                                <BreezeInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                            </div>

                            <div>
                                <BreezeLabel
                                    class="mt-4"
                                    for="description"
                                    value="Description"
                                />
                                <BreezeInput
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    required
                                    autocomplete="description"
                                />
                            </div>

                            <div>
                                <BreezeLabel
                                    class="mt-4"
                                    for="quantity"
                                    value="Quantity"
                                />
                                <BreezeInput
                                    id="quantity"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.quantity"
                                    required
                                    autocomplete="quantity"
                                />
                            </div>

                            <div>
                                <BreezeLabel
                                    class="mt-4"
                                    for="price"
                                    value="Price"
                                />
                                <BreezeInput
                                    id="price"
                                    type="number"
                                    step="0.01"
                                    class="mt-1 block w-full"
                                    v-model="form.price"
                                    required
                                    autocomplete="price"
                                />
                            </div>

                            <div>
                                <BreezeLabel
                                    class="mt-4"
                                    for="status"
                                    value="Status"
                                />
                                <select
                                    id="status"
                                    class="mt-1 block w-full block appearance-none bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    v-model="form.status"
                                    required
                                >
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <BreezeButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Submit
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

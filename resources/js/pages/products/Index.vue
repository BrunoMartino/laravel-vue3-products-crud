<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: '/products',
    },
];

interface Product {
    id: number;
    name: string;
    price: number;
    description: string;
}

interface Props {
    products: Product[];
}

const props = defineProps<Props>();

const handleDelete = (id: number) => {
    if (confirm('Do you want to delete this product?')) {
        router.delete(route('products.destroy', { id }));
    }
};
</script>

<template>
    <Head title="Products" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="overflow-x-auto">
            <div class="my-4 text-center text-sm text-gray-500 dark:text-gray-400">A list of your recent products.</div>
            <table class="min-w-full border-collapse text-left text-sm text-gray-900 dark:text-gray-100">
                <thead class="border-b text-gray-500 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="w-[100px] px-4 py-2 font-medium">ID</th>
                        <th scope="col" class="w-[100px] px-4 py-2 font-medium">Product</th>
                        <th scope="col" class="px-4 py-2 font-medium">Price</th>
                        <th scope="col" class="px-4 py-2 font-medium">Description</th>
                        <th scope="col" class="px-4 py-2 text-center font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr v-for="product in props.products" :key="product.id">
                        <td class="px-4 py-2">{{ product.id }}</td>
                        <td class="px-4 py-2">{{ product.name }}</td>
                        <td class="px-4 py-2">{{ product.price }}</td>
                        <td class="px-4 py-2">{{ product.description }}</td>
                        <td class="flex items-center justify-center gap-4 px-4 py-2">
                            <Link :href="route('products.edit', { id: product.id })"
                                ><Button class="dark:ext-black dark:bg-slate-300">Edit</Button></Link
                            >
                            <Button class="dark:bg-red-900 dark:text-white" @click="handleDelete(product.id)">Delete</Button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4">
            <Link :href="route('products.create')"><Button>Create Products</Button></Link>
        </div>
    </AppLayout>
</template>

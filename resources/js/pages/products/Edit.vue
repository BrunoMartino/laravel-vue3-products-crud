<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

interface Product {
    id: number;
    name: string;
    price: number;
    description: number;
}

const props = defineProps<{ product: Product }>();

const form = useForm({
    name: props.product.name,
    price: props.product.price,
    description: props.product.description,
});

const handleSubmit = () => {
    form.put(route('products.update', { product: props.product }));
};
</script>

<template>
    <Head title="Edit a Product" />

    <AppLayout :breadcrumbs="[{ title: 'Edit a Product', href: `/products/${props.product.id}/edit` }]">
        <form @submit.prevent="handleSubmit" class="w-8/12 space-y-4 p-8">
            <div class="space-y-2">
                <Label for="products name">Product Name</Label>
                <Input v-model="form.name" type="text" placeholder="Name your product here" />
                <div class="text-sm text-red-600" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>
            <div class="space-y-2">
                <Label for="products description">Description</Label>
                <Input v-model="form.description" row="6" placeholder="describe your product here" />
                <div class="text-sm text-red-600" v-if="form.errors.description">{{ form.errors.description }}</div>
            </div>
            <div class="space-y-2">
                <Label for="products price">Price</Label>
                <Input v-model="form.price" type="text" placeholder="put your price here" />
                <div class="text-sm text-red-600" v-if="form.errors.price">{{ form.errors.price }}</div>
            </div>
            <Button type="submit"> Add new product</Button>
        </form>
    </AppLayout>
</template>

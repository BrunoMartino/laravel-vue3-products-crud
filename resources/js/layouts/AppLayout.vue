<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { watch } from 'vue';
import { toast } from 'vue3-toastify';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage();
watch(
    () => page.props.flash,
    (flash) => {
        if (flash?.message) {
            const type = flash.type || 'success';

            if (type === 'error') {
                toast.error(flash.message);
            } else if (type === 'info') {
                toast.info(flash.message);
            } else if (type === 'warning') {
                toast.warning(flash.message);
            } else {
                toast.success(flash.message);
            }
        }
    },
    { immediate: true },
);
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayout>
</template>

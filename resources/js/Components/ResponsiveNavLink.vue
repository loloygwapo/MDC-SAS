<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? "bg-blue-900 text-white group flex items-center px-2 py-2 text-sm sm:text-base font-medium rounded-md"
        : "text-gray-300 hover:bg-blue-800 hover:text-white group flex items-center px-2 py-2 text-sm sm:text-base font-medium rounded-md"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

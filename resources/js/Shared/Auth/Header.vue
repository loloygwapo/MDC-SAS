<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="fixed inset-x-0 top-0 h-[5.25rem] bg-yellow-400"></div>
    <nav
        class="fixed inset-x-0 top-0 flex items-center justify-center w-full h-20 px-4 text-white bg-blue-700 sm:justify-between sm:px-6"
    >
        <Link
            :href="route('homepage.index')"
            class="flex items-center flex-shrink-0 px-4"
        >
            <!-- <img
                class="w-auto h-10 sm:h-14"
                src="images/mdc-logo.png"
                alt="MDC Logo"
            /> -->
            <span
                class="ml-2 text-base font-semibold text-white sm:text-md md:text-2xl"
            >
                MATER DEI COLLEGE SCHOLARSHIP SYSTEM
            </span>
        </Link>
    </nav>
</template>

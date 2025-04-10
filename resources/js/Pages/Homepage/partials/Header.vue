<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <nav class="relative flex items-center justify-between h-16 sm:h-14 md:h-12 lg:h-16 xl:h-20">
        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0 md:ml-1">
            <div class="flex items-center justify-between w-full ml-3 md:w-auto">
                <Link href="/" class="flex items-center space-x-2">
                    <span class="sr-only">Logo</span>
                    <img
                        class="w-auto h-12 sm:h-15 md:h-17"
                        src="../images/mdc-logo.png"
                        alt="School Logo"
                    />
                   <!-- <span class="ml-2 text-[26px] text-lg font-semibold text-gray-800" style="font-family: 'Cloister Black', sans-serif;">
                    Mater Dei College
                </span> -->

                </Link>
            </div>
        </div>


        <div class="flex gap-2 md:absolute md:items-center md:justify-end md:inset-y-0 md:right-0 md:mr-4">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="inline-flex items-center px-4 py-2 text-xs font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm sm:text-sm md:text-base hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Dashboard
            </Link>
            <template v-else>
                <Link
                    :href="route('login')"
                    class="inline-flex items-center px-4 py-2 text-xs font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm sm:text-sm md:text-base hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Login
                </Link>
                <Link
                    :href="route('register')"
                    class="inline-flex items-center px-4 py-2 text-xs font-medium text-white border border-transparent rounded-md shadow-sm sm:text-sm md:text-base bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
                >
                    Register
                </Link>
            </template>
        </div>
    </nav>
</template>

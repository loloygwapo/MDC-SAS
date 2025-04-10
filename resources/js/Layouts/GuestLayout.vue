<script setup>
import Header from "@/Shared/Auth/Header.vue";
import Footer from "@/Shared/Auth/Footer.vue";
</script>

<template>

<div class="relative flex items-center justify-center w-full min-h-screen">
        <img src="../Components/images/mdc.png" alt="mdc-background"
            class="fixed top-0 left-0 object-cover w-full h-full">

        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <div class="relative z-30 flex flex-col items-center justify-center w-full px-6">
            <Transition name="fade-in">
               <div class="w-full p-8 bg-white rounded-lg shadow-xl opacity-90 sm:w-4/5 md:w-3/5 lg:w-2/5 min-h-[100px]">



                   <a href="/">
                        <img src="../Components/images/mdc-logo.png" alt="MDC Logo" class="mx-auto mb-4 w-28">
                    </a>


                    <h1 class="text-2xl font-bold text-center text-gray-700 uppercase">Welcome Back!</h1>

                    <slot />
                </div>

            </Transition>
        </div>
    </div>
</template>

<script setup>
import Footer from "./partials/Footer.vue";
import Header from "./partials/Header.vue";
import Hero from "./partials/Hero.vue";
import HeroImage from "./partials/HeroImage.vue";
import BackgroundPattern from "./partials/BackgroundPattern.vue";
import ScholarshipCard from "../../Shared/ScholarshipCard.vue";
import { Head } from "@inertiajs/vue3";
import ModalMessagePrivateLink from "@/Components/ModalMessagePrivateLink.vue";
import Announcements from "./partials/Announcements.vue";

defineProps(["scholarships", "announcements"]);
</script>

<template>
    <Head title="Scholarships" />
    <ModalMessagePrivateLink />
    <div class="flex flex-col min-h-screen bg-gray-50">
        <div class="relative overflow-hidden">
            <BackgroundPattern />
            <div class="relative pt-3 pb-6">
                <div class="px-4 mx-auto max-w-7xl sm:px-6">
                    <!-- Header remains fixed -->
                    <div class="fixed top-0 left-0 z-50 w-full bg-white shadow-md">
                        <Header />
                    </div>
                </div>
                <Hero />
            </div>
            <HeroImage />
        </div>

        <div class="flex-grow py-8 bg-gray-800 shadow-lg">
            <div class="px-4 py-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h2
                    class="mt-12 mb-12 text-lg font-semibold tracking-wide text-center uppercase font-montserrat text-gray-50 md:text-2xl lg:text-3xl">
                    Available Scholarships
                </h2>

                <div v-if="scholarships.length === 0" class="flex flex-col items-center justify-center gap-8 mt-8">
                    <img class="object-contain h-60" src="/images/empty-state/empty-scholarship.svg" />
                    <h2 class="text-center text-white uppercase sm:text-xl">
                        No Available Scholarships at the Moment
                    </h2>
                </div>



                <div v-if="scholarships" class="grid grid-cols-1 mb-6 lg:grid-cols-3 gap-y-12 lg:gap-x-8">
                    <ScholarshipCard :scholarships="scholarships" />
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 z-50 w-full text-white bg-gray-900 shadow-md">
        <Footer />
    </div>
</template>

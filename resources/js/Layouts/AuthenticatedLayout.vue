<script setup>
import DangerMessage from "@/Components/DangerMessage.vue";
import SuccessMessage from "@/Components/SuccessMessage.vue";
import Sidebar from "@/Components/Sidebar.vue";
import SidebarHeader from "@/Components/SidebarHeader.vue";
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <SidebarHeader />
        <Sidebar />
        <main class="flex-1 mt-12">
            <div class="px-4 mx-auto max-w-7xl md:ml-64 sm:px-6 md:px-8">
                <div class="py-4">
                    <SuccessMessage />
                    <DangerMessage />
                    <div class="pt-10">
                        <slot />
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

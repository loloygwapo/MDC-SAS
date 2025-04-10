<script setup>
let time = new Date().getFullYear();
</script>

<template>
    <div class="fixed inset-x-0 bottom-0 bg-yellow-400 h-11"></div>
    <footer class="fixed inset-x-0 bottom-0 w-full h-10 text-white bg-blue-700">
        <div class="my-2 text-center">
            &copy;
            <span id="copyright">
                {{ time }}
                {{ " " }}
            </span>
            Mater Dei College
        </div>
    </footer>
</template>

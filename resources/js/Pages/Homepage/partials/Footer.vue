<script setup>
import { ref, onMounted, onUnmounted } from "vue";

const date = new Date().getFullYear();
const showFooter = ref(false);

const handleScroll = () => {
  const scrollPosition = window.innerHeight + window.scrollY;
  const pageHeight = document.documentElement.scrollHeight;

  showFooter.value = scrollPosition >= pageHeight;
};

onMounted(() => {
  window.addEventListener("scroll", handleScroll);
});

onUnmounted(() => {
  window.removeEventListener("scroll", handleScroll);
});
</script>

<template>
  <footer
    v-if="showFooter"
    class="flex items-center justify-center w-full h-16 bg-gray-100 sm:h-14 md:h-14"
  >
    <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 md:flex md:items-center md:justify-center lg:px-8">
      <p class="text-sm text-center text-gray-500 sm:text-base">
        &copy;
        <span id="copyright">{{ date }}</span>
        {{ " " }}
        <a
          target="__blank"
          class="text-indigo-600 hover:underline"
          href="https://www.materdeicollege.com/"
        >
          Mater Dei College
        </a>. All rights reserved.
      </p>
    </div>
  </footer>
</template>

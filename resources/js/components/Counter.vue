<script setup>
import { ref } from "vue";

const count = ref(0);
console.log(count);
</script>

<template>
    {{ count }}
    <button @click="count++">Increment</button>
</template>

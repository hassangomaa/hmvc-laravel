<template>
  <div class="container mt-4">
    <nav class="mb-4">
      <router-link to="/" class="btn btn-primary">Home</router-link>
      <router-link to="/create" class="btn btn-success ms-2">Create New</router-link>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script setup>
</script>

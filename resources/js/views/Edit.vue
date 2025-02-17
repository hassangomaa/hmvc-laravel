<template>
  <div>
    <h2>Edit Item</h2>
    <form @submit.prevent="updateItem">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" v-model="name" class="form-control" required />
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter, useRoute } from 'vue-router';

const name = ref('');
const router = useRouter();
const route = useRoute();

const fetchItem = async () => {
  const response = await axios.get(`/api/items/${route.params.id}`);
  name.value = response.data.name;
};

const updateItem = async () => {
  await axios.put(`/api/items/${route.params.id}`, { name: name.value });
  router.push('/');
};

onMounted(fetchItem);
</script>

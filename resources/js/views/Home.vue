<template>
    <div>
        <h2 class="mb-3">All Items</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items" :key="item.id">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>${{ item.price }}</td>
                    <td>{{ item.stock }}</td>
                    <td>
                        <span
                            class="badge bg-success"
                            v-if="item.status === 'available'"
                            >Available</span
                        >
                        <span
                            class="badge bg-warning"
                            v-else-if="item.status === 'out_of_stock'"
                            >Out of Stock</span
                        >
                        <span class="badge bg-danger" v-else>Discontinued</span>
                    </td>
                    <td>
                        <router-link
                            :to="'/edit/' + item.id"
                            class="btn btn-warning btn-sm"
                            >Edit</router-link
                        >
                        <button
                            @click="deleteItem(item.id)"
                            class="btn btn-danger btn-sm ms-2"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const items = ref([]);

const fetchItems = async () => {
    const response = await axios.get("/api/items");
    items.value = response.data;
};

const deleteItem = async (id) => {
    if (confirm("Are you sure?")) {
        await axios.delete(`/api/items/${id}`);
        fetchItems();
    }
};

onMounted(fetchItems);
</script>

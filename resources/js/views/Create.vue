<template>
    <div>
        <h2>Create Item</h2>
        <form @submit.prevent="createItem">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input
                    type="text"
                    v-model="name"
                    class="form-control"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input
                    type="number"
                    v-model="price"
                    class="form-control"
                    required
                />
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input
                    type="number"
                    v-model="stock"
                    class="form-control"
                    required
                />
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const name = ref("");
const price = ref("");
const stock = ref("");
const router = useRouter();

const createItem = async () => {
    await axios.post("/api/items", {
        name: name.value,
        price: price.value,
        stock: stock.value,
    });
    router.push("/");
};
</script>

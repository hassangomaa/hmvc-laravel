<template>
    <div class="card p-4">
        <h2 class="mb-3">Create Item</h2>
        <form @submit.prevent="createItem">
            <!-- Name Field -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input
                    type="text"
                    v-model="name"
                    @blur="v$.name.$touch()"
                    class="form-control"
                    :class="{ 'is-invalid': v$.name.$error }"
                />
                <div v-if="v$.name.$error" class="invalid-feedback">
                    <span v-if="v$.name.required.$invalid">Name is required.</span>
                </div>
            </div>

            <!-- Price Field -->
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input
                    type="number"
                    v-model="price"
                    @blur="v$.price.$touch()"
                    class="form-control"
                    :class="{ 'is-invalid': v$.price.$error }"
                />
                <div v-if="v$.price.$error" class="invalid-feedback">
                    <span v-if="v$.price.required.$invalid">Price is required.</span>
                    <span v-if="v$.price.minValue.$invalid">Price must be at least $1.</span>
                </div>
            </div>

            <!-- Stock Field -->
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input
                    type="number"
                    v-model="stock"
                    @blur="v$.stock.$touch()"
                    class="form-control"
                    :class="{ 'is-invalid': v$.stock.$error }"
                />
                <div v-if="v$.stock.$error" class="invalid-feedback">
                    <span v-if="v$.stock.required.$invalid">Stock is required.</span>
                    <span v-if="v$.stock.minValue.$invalid">Stock cannot be negative.</span>
                </div>
            </div>

            <button type="submit" class="btn btn-success" :disabled="v$.$invalid">
                Create
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { useVuelidate } from "@vuelidate/core";
import { required, minValue } from "@vuelidate/validators";

const name = ref("");
const price = ref("");
const stock = ref("");
const router = useRouter();

// Validation Rules
const rules = {
    name: { required },
    price: { required, minValue: minValue(1) }, // Minimum price: $1
    stock: { required, minValue: minValue(0) } // Stock cannot be negative
};

// Initialize Vuelidate
const v$ = useVuelidate(rules, { name, price, stock });

const createItem = async () => {
    const isValid = await v$.$validate();
    if (!isValid) return;

    await axios.post("/api/items", {
        name: name.value,
        price: price.value,
        stock: stock.value,
    });

    router.push("/");
};
</script>

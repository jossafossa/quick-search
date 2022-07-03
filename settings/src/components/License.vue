<template>
  <label for="license">Licence Key</label>
  <input
    :style="{ 'background-color': valid ? 'green' : 'red' }"
    type="text"
    v-model="licenseKey"
  />
  <button @click.prevent="validate">Validate</button>
</template>

<script setup>
import { ref } from "vue";
import { wpAjax } from "@/assets/js/helpers.js";

const licenseKey = ref("62c0d6cce75a3");
const valid = ref("");

const validate = async () => {
  const response = await wpAjax("qs_validate_license", {
    key: licenseKey.value,
  });
  console.log(response, licenseKey.value);

  valid.value = response.success;
};
</script>

<template>
  <div class="messages">
    <div
      class="notice is-dismissible"
      v-for="(message, key) in messages"
      :class="{
        ' notice-error': message.type === 'error',
        ' notice-success': message.type === 'success',
      }"
      :key="key"
    >
      <p>
        {{ message.text }}
      </p>
    </div>
  </div>
  <h2>License Key {{ active ? `(active)` : "" }}</h2>
  <input type="text" v-model="licenseKey" />
  <button v-if="!active" @click.prevent="activate">Activate</button>
  <button v-if="active" @click.prevent="deactivate">Deactivate</button>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { wpAjax } from "@/assets/js/helpers.js";

const licenseKey = ref("");
const active = ref(false);
const messages = ref([]);
let controller = new AbortController();

// fill in license
onMounted(() => {
  active.value = "qsLicense" in window;
  if (active.value) {
    licenseKey.value = window.qsLicense;
  }
});

const activate = async () => {
  controller.abort();
  controller = new AbortController();
  const response = await wpAjax(
    "qs_activate_license",
    {
      key: licenseKey.value,
    },
    controller.signal
  );
  if (response.success) {
    active.value = true;
  }
  messages.value.push({
    type: response.success ? "success" : "error",
    text: response.data.message,
  });
};

const deactivate = async () => {
  controller.abort();
  controller = new AbortController();
  const response = await wpAjax(
    "qs_deactivate_license",
    {
      key: licenseKey.value,
    },
    controller.signal
  );
  active.value = false;
  messages.value.push({
    type: response.success ? "success" : "error",
    text: response.data.message,
  });
};
</script>

<style lang="scss" scoped></style>

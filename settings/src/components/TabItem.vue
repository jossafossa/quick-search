<template>
  <a :href="'#' + slug" class="nav-tab" :class="{ 'nav-tab-active': active }">
    <slot></slot>
  </a>
</template>

<script setup>
import defineProps from "vue";
defineProps({
  title: String,
  slug: String,
  active: Boolean,
});
</script>

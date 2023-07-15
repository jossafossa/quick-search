<template>
  <div class="shortcuts vstack gap-1">
    <slot></slot>
    <button class="qs-button" @click.prevent="emit('add')">+</button>
  </div>
</template>

<script setup>
// imports
import { defineEmits } from "vue";

// props
// const props = defineProps({
//   shortcuts: Array,
//   name: String
// })

const emit = defineEmits(["add", "remove"]);
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.shortcuts {
  background-color: var(--shortcuts-background);
  color: var(--qs-color);
  border-radius: var(--border-radius);

  > button {
    border: none;
    width: 100%;
    padding: 0.25rem 1rem;
    cursor: pointer;
  }
}
</style>

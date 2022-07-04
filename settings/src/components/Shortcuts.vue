<template>
  <div class="shortcuts">
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
  --shortcuts-background: var(--qs-background);
  --shortcut-input-background: var(--qs-foreground);
  --shortcut-input-focus-background: var(--qs-highlight);
  border: 1px solid var(--qs-border);
  background-color: var(--shortcuts-background);
  color: var(--qs-color);
  padding: 1rem;

  > button {
    margin-top: 0.5rem;
    border: none;
    width: 100%;
    padding: 0.25rem 1rem;
    cursor: pointer;
  }
}
</style>

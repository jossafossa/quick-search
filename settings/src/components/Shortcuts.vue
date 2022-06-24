<template>
  <div class="shortcuts">
    <slot></slot>
    <button @click.prevent="emit('add')">+</button>
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
  --shortcuts-background: #1d2327;
  --shortcut-input-background: #2c3337;
  --shortcut-input-focus-background: #3f484e;
  background-color: var(--shortcuts-background);
  color: white;
  padding: 1rem;

  >button {
    margin-top: .5rem;
    background-color: var(--shortcut-input-background);
    border: none;
    width: 100%;
    padding: .25rem 1rem;
    color: white;
    cursor: pointer;

    &:hover {
      background-color: var(--shortcut-input-focus-background);
    }
  }
}
</style>

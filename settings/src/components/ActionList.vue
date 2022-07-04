<template>
  <div class="action-list-wrapper">
    <div class="action-list-header">
      <h3>{{ props.title }}</h3>
      <button class="qs-button" @click.prevent="emit('buttonClick')">
        {{ props.button }}
      </button>
    </div>
    <div class="action-list">
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";
const props = defineProps({
  title: String,
  button: String,
});

const emit = defineEmits(["buttonClick"]);
</script>

<style lang="scss">
.action-list-wrapper {
  border: 1px solid var(--qs-border);
  padding: 1rem;
  display: flex;
  flex-direction: column;
  background-color: var(--qs-background);

  > .action-list-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.5rem;

    > h3 {
      font-size: 120%;
      color: inherit;
      margin: 0;
    }
  }
}

.action-list {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  flex: 1;
  overflow: auto;
}
</style>

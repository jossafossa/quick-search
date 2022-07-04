<template>
  <div class="excluded-actions">
    <slot></slot>
  </div>
</template>

<script setup></script>

<style lang="scss">
.excluded-actions {
  display: flex;
  align-items: stretch;
  gap: 1rem;
  max-height: calc(70vh - 32px);
  color: var(--qs-color);

  > * {
    flex: 1;
  }
}
</style>

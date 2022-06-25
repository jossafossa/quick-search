
<template>
  <div class="excluded-actions">
    <slot></slot>
  </div>
</template>

<script setup>
</script>

<style lang="scss">
  .excluded-actions {
    padding:1rem;
    display:flex;
    align-items:stretch;
    background-color: var(--qs-background);
    gap: 1rem;
    max-height: calc(70vh - 32px);
    
    
    > * {
      flex:1;
    }
  }
</style>

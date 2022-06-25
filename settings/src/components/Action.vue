
<template>
  <div class="qs-action">
    <span class="qs-action-icon dashicons" :class="props.action.icon"></span>
    <p class="qs-action-title">{{props.action.label}}</p>
    <slot></slot>  
    <span class="qs-action-tags">
      <span v-for="(tag, index) of props.action.tags" :key="index">{{tag}}</span>
    </span>
  </div>
</template>

<script setup>
  import {defineProps} from 'vue';

  const props = defineProps({
    action: Object,
    id: String
  })

</script>

<style lang="scss" scoped>
  .action {
    padding: .5rem 1rem;
    display:flex;
    align-items: center;
    gap:1rem;
    background-color: var(--qs-foreground); 
    color:white;
    cursor: pointer;

    &:hover, &:focus {
      background-color: var(--qs-highlight);
    }
  }
</style>


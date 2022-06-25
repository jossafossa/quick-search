<template>
  <div class="action-list-wrapper">
    <h3>{{props.title}}</h3>
    <div class="action-list">
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import {defineProps} from 'vue';
const props = defineProps({
  title: String
})
</script>

<style lang="scss">
  .action-list-wrapper {
    border:2px solid var(--qs-foreground);
    padding:1rem;
    display:flex;
    flex-direction: column;

    > h3 {
      font-size: 120%;
      color:white;
      margin:0;
      margin-bottom:.5rem;
    }
  }

  .action-list {
    display:flex;
    flex-direction: column;
    gap: .5rem;
    flex:1;
    overflow:auto;
  }
</style>

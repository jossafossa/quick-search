<template>
  <div class="shortcut-input" :class="{ 'is-hidden': props.type === 'hidden' }">
    <label v-if="props.type !== 'hidden'" :for="uuid">"{{ props.label }}":</label>
    <div class="input-wrapper">
      <span>"</span>
      <input :id="uuid" :type="props.type" :name="`${namePrefix}[${label}]`" :value="props.value">
      <span>"</span>
    </div>
  </div>
</template>

<script setup>

import { defineProps } from 'vue';
const props = defineProps({
  type: String,
  namePrefix: Number,
  value: String,
  label: String
});

const uuid = `${props.label}-${Math.floor(Math.random() * 1000)}`;

</script>

<style lang="scss" scoped>
.shortcut-input {
  display: flex;
  align-items: center;
  padding-left: 1rem;

  &.is-hidden {
    display: none;
  }


  >label {
    min-width: 100px;
    text-align: left;
    position: relative;
    display: flex;
    align-items: center;
  }

  >.input-wrapper {
    flex: 1;
  }


}

.input-wrapper {
  display: flex;
  align-items: center;
  background-color: transparent;
  position: relative;
  padding: .25rem;
  margin: -.25rem 0;
  background-color: var(--background);
  border-radius: var(--border-radius);
  z-index: 0;

  >span {
    width: 1.5rem;
    display: flex;
    // height: 100%;
    align-items: center;
    justify-content: center;
    position: absolute;
    left: 0;
    opacity: 0.5;
    padding: .25rem 0;
    line-height: 1;

    &:nth-last-child(1) {
      left: auto;
      right: 0;
    }
  }

  &:focus-within {
    z-index: 2;
  }

  >input {
    flex: 1;
    background-color: transparent;
    border: 0px solid transparent;
    padding: .25rem 1rem;
    line-height: 1;
    color: inherit;
    position: relative;
    font-size: inherit;


    &:focus {
      box-shadow: 0 0 0 transparent;
    }

  }
}
</style>
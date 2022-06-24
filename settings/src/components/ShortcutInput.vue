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

<style lang="scss">
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
  align-items: stretch;
  background-color: transparent;
  position: relative;
  padding: .5rem;
  margin: -.5rem;
  background-color: rgba(255, 255, 255, 0.1);

  >span {
    width: 1.5rem;
    display: flex;
    height: 100%;
    align-items: center;
    justify-content: center;
    position: absolute;
    left: 0;

    &:nth-last-child(1) {
      left: auto;
      right: 0;
    }
  }

  >input {
    flex: 1;
    background-color: transparent;
    border: 0px solid transparent;
    padding: .25rem 1.5rem;
    line-height: 1;
    color: inherit
  }
}
</style>
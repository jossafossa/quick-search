<template>
  <div class="settings">
    <tabs>
      <tab name="general">
        <h2>Dark mode</h2>
        <input
          name="qs_options[dark_mode]"
          :checked="settings.dark_mode ? 'on' : null"
          @change="toggleDarkColorScheme"
          type="checkbox"
        />

        <h2>Custom url actions</h2>
        <Shortcuts name="custom_urls" type="url" @add="addURL">
          <Shortcut
            @remove="removeURL(index)"
            @add="addURL(index)"
            :name="name"
            :type="type"
            v-for="(shortcut, index) of shortcuts"
            :key="index"
            :index="index"
            :shortcut="shortcut"
          >
            <ShortcutInput
              label="label"
              type="text"
              :namePrefix="`${customURLNamePrefix}[${index}]`"
              :value="shortcut.label"
            />
            <ShortcutInput
              label="icon"
              type="text"
              :namePrefix="`${customURLNamePrefix}[${index}]`"
              :value="shortcut.icon"
            />
            <ShortcutInput
              label="type"
              type="hidden"
              :namePrefix="`${customURLNamePrefix}[${index}]`"
              :value="shortcut.type"
            />
            <ShortcutInput
              label="url"
              type="text"
              :namePrefix="`${customURLNamePrefix}[${index}]`"
              :value="shortcut.url"
            />
          </Shortcut>
        </Shortcuts>

        <h2>Exclude specific actions</h2>
        <ExcludedActions>
          <ActionList
            title="Enabled actions"
            button="Enable all"
            @buttonClick="enableAll"
          >
            <Action
              v-for="(action, actionID) of enabledActions"
              :key="actionID"
              :action="action"
              :id="actionID"
              @click="disableAction(actionID)"
            >
            </Action>
          </ActionList>

          <ActionList
            title="Disabled actions"
            button="Disable all"
            @buttonClick="disableAll"
          >
            <Action
              v-for="(action, actionID) of disabledActions"
              :key="actionID"
              :action="action"
              :id="actionID"
              @click="enableAction(actionID)"
            >
              <input
                type="hidden"
                :name="disabledActionsName"
                :value="actionID"
              />
            </Action>
          </ActionList>
        </ExcludedActions>
      </tab>
      <tab name="License">
        <License></License>
      </tab>
      <tab name="Get premium">
        <h2>Support WpQuickSearch and get these awesome features</h2>

        <ul>
          <li>
            Get integrations with more than 10 plugins like ACF and Gravity
            forms
          </li>
          <li>
            Add custom actions from the settings from the wordpress backend
          </li>
          <li>Disable specific actions</li>
          <li>Switch between dark and light mode</li>
          <li>Bind shortcuts to actions</li>
        </ul>

        <a href="https://www.jossafossa.nl/wpQuickSearch" class="button primary"
          >Get premium</a
        >
      </tab>

      <tab name="Changelog"> </tab>
    </tabs>
  </div>
</template>

<script setup>
import ShortcutInput from "@/components/ShortcutInput.vue";
import Shortcuts from "@/components/Shortcuts.vue";
import Shortcut from "@/components/Shortcut.vue";
import ExcludedActions from "@/components/ExcludedActions.vue";
import ActionList from "@/components/ActionList.vue";
import Action from "@/components/Action.vue";
import Tab from "@/components/Tab.vue";
import Tabs from "@/components/Tabs.vue";
import License from "@/components/License.vue";

import { onMounted, ref } from "vue";

const shortcuts = ref([]);
const enabledActions = ref([]);
const actions = ref({});
const settings = ref({});
const disabledActions = ref([]);
const shortcutElements = ref([]);
const customURLNamePrefix = `qs_options[custom_urls]`;
const disabledActionsName = `qs_options[disabled_actions][]`;
const defaultShortcut = {
  label: "",
  icon: "dashicons-block-default",
  url: "",
  type: "url",
};

// populate vue with external data
onMounted(() => {
  shortcuts.value = window.qsCustomURLs;
  actions.value = window.qsAllActions;
  settings.value = window.qsSettings;

  const disabledEntries = Object.entries(window.qsAllActions).filter(
    ([key]) => {
      if (window.qsDisabledActions.includes(key)) return true;
    }
  );
  disabledActions.value = Object.fromEntries(disabledEntries);

  const enabledEntries = Object.entries(window.qsAllActions).filter(([key]) => {
    if (!window.qsDisabledActions.includes(key)) return true;
  });
  enabledActions.value = Object.fromEntries(enabledEntries);
});

// insert a new custom url at index
const addURL = (index = false) => {
  console.log(index);
  if (index !== false) {
    shortcuts.value.splice(index + 1, 0, defaultShortcut);
    console.log(shortcutElements.value[index]);
    shortcutElements.value[index].focus();
  } else {
    shortcuts.value.push(defaultShortcut);
  }
};

// remove url at index
const removeURL = (id) => {
  shortcuts.value.splice(id, 1);
};

const disableAction = (index) => {
  // const action = enabledActions.value.splice(index, 1);
  // disabledActions.value.unshift(action[0]);
  disabledActions.value[index] = enabledActions.value[index];
  delete enabledActions.value[index];
};

const enableAction = (index) => {
  // const action = disabledActions.value.splice(index, 1);
  enabledActions.value[index] = disabledActions.value[index];
  delete disabledActions.value[index];
};

const enableAll = () => {
  enabledActions.value = actions.value;
  disabledActions.value = [];
};

const disableAll = () => {
  disabledActions.value = actions.value;
  enabledActions.value = [];
};

// color scheme
const toggleDarkColorScheme = (e) => {
  if (e.target.checked) {
    document.body.classList.add("qs-dark");
  } else {
    document.body.classList.remove("qs-dark");
  }
};
</script>

<style lang="scss">
#app {
  // --qs-background: #1d2327;
  // --qs-foreground: #2c3337;
  // --qs-highlight: #3f484e;
}

.qs-button {
  border: 0px solid red;
  background-color: var(--qs-action-background);
  color: var(--qs-action-color);
  cursor: pointer;
  padding: 0.25rem 1rem;

  &:hover {
    background-color: var(--qs-action-active-background);
    color: var(--qs-action-active-color);
  }
}
</style>

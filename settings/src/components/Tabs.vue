<template>
  <nav class="nav-tab-wrapper">
    <a
      v-for="(tab, i) in tabs"
      :key="i"
      class="nav-tab"
      v-html="tab.header"
      :aria-controls="tab.hash"
      :aria-selected="tab.isActive"
      @click.prevent="selectTab(tab.hash, $event)"
      :href="tab.hash"
      :class="[
        navItemClass,
        tab.isDisabled ? navItemDisabledClass : '',
        tab.isActive ? 'nav-tab-active' : '',
      ]"
      role="tab"
    ></a>
  </nav>
  <div class="tab-content qs-tab-content">
    <slot />
  </div>
</template>

<script>
class ExpiringStorage {
  get(key) {
    const cached = JSON.parse(localStorage.getItem(key));

    if (!cached) {
      return null;
    }

    const expires = new Date(cached.expires);

    if (expires < new Date()) {
      localStorage.removeItem(key);
      return null;
    }

    return cached.value;
  }

  set(key, value, lifeTimeInMinutes) {
    const currentTime = new Date().getTime();

    const expires = new Date(currentTime + lifeTimeInMinutes * 60000);

    localStorage.setItem(key, JSON.stringify({ value, expires }));
  }
}
const expiringStorage = new ExpiringStorage();

import { reactive, provide, onMounted, toRefs } from "vue";

export default {
  props: {
    cacheLifetime: {
      default: 5,
    },
    options: {
      type: Object,
      required: false,
      default: () => ({
        useUrlFragment: true,
        defaultTabHash: null,
      }),
    },
    wrapperClass: {
      type: String,
      default: "tabs-component",
    },
    panelsWrapperClass: {
      type: String,
      default: "tabs-component-panels",
    },
    navClass: {
      type: String,
      default: "tabs-component-tabs",
    },
    navItemClass: {
      type: String,
      default: "tabs-component-tab",
    },
    navItemDisabledClass: {
      type: String,
      default: "is-disabled",
    },
    navItemActiveClass: {
      type: String,
      default: "is-active",
    },
    navItemLinkClass: {
      type: String,
      default: "tabs-component-tab-a",
    },
    navItemLinkActiveClass: {
      type: String,
      default: "is-active",
    },
    navItemLinkDisabledClass: {
      type: String,
      default: "is-disabled",
    },
  },

  emits: ["changed", "clicked"],

  setup(props, context) {
    const state = reactive({
      activeTabHash: "",
      lastActiveTabHash: "",
      tabs: [],
    });

    provide("tabsProvider", state);

    provide("addTab", (tab) => {
      state.tabs.push(tab);
    });

    provide("updateTab", (computedId, data) => {
      let tabIndex = state.tabs.findIndex(
        (tab) => tab.computedId === computedId
      );

      data.isActive = state.tabs[tabIndex].isActive;

      state.tabs[tabIndex] = data;
    });

    provide("deleteTab", (computedId) => {
      let tabIndex = state.tabs.findIndex(
        (tab) => tab.computedId === computedId
      );

      state.tabs.splice(tabIndex, 1);
    });

    const selectTab = (selectedTabHash, event) => {
      if (event) {
        history.replaceState({}, "", event.target.href);
      }

      const selectedTab = findTab(selectedTabHash);

      if (!selectedTab) {
        return;
      }

      if (event && selectedTab.isDisabled) {
        event.preventDefault();
        return;
      }

      if (state.lastActiveTabHash === selectedTab.hash) {
        context.emit("clicked", { tab: selectedTab });
        return;
      }

      state.tabs.forEach((tab) => {
        tab.isActive = tab.hash === selectedTab.hash;
      });

      context.emit("changed", { tab: selectedTab });

      state.lastActiveTabHash = state.activeTabHash = selectedTab.hash;

      const storageKey = `vue-tabs-component.cache.${window.location.host}${window.location.pathname}`;
      expiringStorage.set(storageKey, selectedTab.hash, props.cacheLifetime);
    };

    const findTab = (hash) => {
      return state.tabs.find((tab) => tab.hash === hash);
    };

    onMounted(() => {
      if (!state.tabs.length) {
        return;
      }

      window.addEventListener("hashchange", () =>
        selectTab(window.location.hash)
      );

      if (findTab(window.location.hash)) {
        selectTab(window.location.hash);
        return;
      }

      const storageKey = `vue-tabs-component.cache.${window.location.host}${window.location.pathname}`;
      const previousSelectedTabHash = expiringStorage.get(storageKey);

      if (findTab(previousSelectedTabHash)) {
        selectTab(previousSelectedTabHash);
        return;
      }

      if (
        props.options.defaultTabHash &&
        findTab("#" + props.options.defaultTabHash)
      ) {
        selectTab("#" + props.options.defaultTabHash);
        return;
      }

      selectTab(state.tabs[0].hash);
    });

    return {
      ...toRefs(state),
      selectTab,
      findTab,
    };
  },
};
</script>

<style lang="scss">
.qs-tab-content {
  padding-top: 1rem;
}
</style>

<div class="qs-action-popup">
  <div class="qs-action-popup-inner">
    <div class="qs-input-container">
      <input type="text" class="qs-search-term" placeholder="Search for pages, settings etc.">
      <a href="<?= qs_get_settings_url(); ?>">
        <span class="dashicons dashicons-admin-generic"></span>
      </a>
    </div>

    <h2 class="qs-hidden qs-visible" data-qs-history-title><?= __('Action History', 'quicksearch'); ?></h2>
    <h2 class="qs-hidden" data-qs-search-title><?= __('Search Results', 'quicksearch'); ?></h2>
    <span class="qs-hidden qs-action" data-qs-search-none tabindex="0">
      <p><?= __('No actions found', 'quicksearch'); ?></p>
    </span>
    <div class="qs-actions">
      
    </div>
  </div>
</div>

<template id="qs-action-template">
  <button class="qs-action" tabindex="0">
    <span class="qs-action-icon dashicons"></span>
    <p class="qs-action-title">title</p>
    <span class="qs-action-tags"></span>
  </button>
</template>
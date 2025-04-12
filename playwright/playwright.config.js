// playwright.config.js
import { defineConfig } from '@playwright/test';

module.exports = defineConfig({
  testDir: './test',
  timeout: 30000,
  use: {
    baseURL: 'http://localhost:8000', // Laravel server URL
    headless: true,
  },
});

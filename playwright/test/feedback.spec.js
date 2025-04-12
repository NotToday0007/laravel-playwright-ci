// tests/feedback.spec.js
const { test, expect } = require('@playwright/test');

test('Feedback form submission works', async ({ page }) => {
  // Navigate to the feedback form page
  await page.goto('http://localhost:8000/feedback');

  // Fill in the form fields
  await page.waitForTimeout(1000);
  await page.fill('#name', 'Test2 User');
  await page.fill('#email', 'test2@example.com');
  await page.waitForTimeout(1000);
  await page.fill('#message', 'This is a test2 feedback.');
  await page.waitForTimeout(2000);
  // Submit the form
  await page.click('button[type="submit"]');
  await page.waitForTimeout(1000);
  // Wait for and verify the success message
  const successMessage = await page.textContent('.alert-success');
  expect(successMessage).toContain('Feedback submitted!');
});

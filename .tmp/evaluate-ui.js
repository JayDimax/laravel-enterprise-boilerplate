const { chromium } = require('playwright');

const TARGET_URL = 'http://127.0.0.1:8000';

(async () => {
  const browser = await chromium.launch({ headless: false, slowMo: 50 });
  const context = await browser.newContext({ viewport: { width: 1440, height: 1000 } });
  const page = await context.newPage();
  const errors = [];
  page.on('console', msg => { if (msg.type() === 'error') errors.push(msg.text()); });
  page.on('pageerror', err => errors.push(err.message));

  await page.goto(`${TARGET_URL}/login`, { waitUntil: 'networkidle' });
  await page.screenshot({ path: 'F:/boilerplate/.tmp/login-desktop.png', fullPage: true });
  await page.fill('input[name="email"]', 'evaluator@example.test');
  await page.fill('input[name="password"]', 'Evaluation123!');
  await Promise.all([
    page.waitForURL('**/dashboard'),
    page.click('button[type="submit"]'),
  ]);

  const pages = ['/dashboard', '/administration/users', '/administration/users/create', '/administration/users/1', '/administration/roles', '/administration/permissions', '/system/settings', '/system/audit-logs', '/profile', '/account/password'];
  const results = [];
  for (const path of pages) {
    await page.goto(`${TARGET_URL}${path}`, { waitUntil: 'networkidle' });
    const metrics = await page.evaluate(() => ({
      title: document.title,
      h1: document.querySelector('h1')?.textContent?.trim() || null,
      bodyWidth: document.body.scrollWidth,
      viewportWidth: window.innerWidth,
      bodyHeight: document.body.scrollHeight,
      links: [...document.querySelectorAll('a[href]')].length,
      buttons: document.querySelectorAll('button').length,
    }));
    results.push({ path, ...metrics });
  }

  for (const viewport of [
    { name: 'desktop', width: 1440, height: 1000 },
    { name: 'tablet', width: 768, height: 1024 },
    { name: 'mobile', width: 375, height: 812 },
  ]) {
    await page.setViewportSize({ width: viewport.width, height: viewport.height });
    await page.goto(`${TARGET_URL}/dashboard`, { waitUntil: 'networkidle' });
    await page.screenshot({ path: `F:/boilerplate/.tmp/dashboard-${viewport.name}.png`, fullPage: true });
    results.push({ path: `/dashboard@${viewport.name}`, ...(await page.evaluate(() => ({
      bodyWidth: document.body.scrollWidth,
      viewportWidth: window.innerWidth,
      bodyHeight: document.body.scrollHeight,
      navVisible: !![...document.querySelectorAll('aside, nav')].find(el => { const s = getComputedStyle(el); return s.display !== 'none' && s.visibility !== 'hidden' && el.getBoundingClientRect().width > 0; }),
    }))) });
  }

  await page.setViewportSize({ width: 375, height: 812 });
  await page.goto(`${TARGET_URL}/dashboard`, { waitUntil: 'networkidle' });
  const menuButtons = page.locator('button[aria-label*="menu" i], button[aria-controls]');
  if (await menuButtons.count()) {
    await menuButtons.first().click();
    await page.screenshot({ path: 'F:/boilerplate/.tmp/dashboard-mobile-menu.png', fullPage: false });
  }

  console.log(JSON.stringify({ results, errors }, null, 2));
  await browser.close();
})().catch(err => { console.error(err); process.exit(1); });

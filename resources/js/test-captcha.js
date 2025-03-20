import puppeteer from 'puppeteer-extra';
import StealthPlugin from 'puppeteer-extra-plugin-stealth';
import { solveCaptcha } from './captchaSolver.js';

puppeteer.use(StealthPlugin());

async function bypassCaptcha(url) {
    const browser = await puppeteer.launch({ headless: false, args: ['--no-sandbox'] });
    const page = await browser.newPage();

    console.log(`🌍 Opening page: ${url}`);
    await page.goto(url, { waitUntil: 'networkidle2' });

    // Updated CAPTCHA detection for reCAPTCHA
    const recaptchaSelector = '.g-recaptcha, .wpcf7-recaptcha';
    const recaptchaElement = await page.$(recaptchaSelector);

    if (recaptchaElement) {
        console.log('⚠️ reCAPTCHA detected! Solving...');
        
        // Get the reCAPTCHA sitekey
        const sitekey = await page.evaluate(el => el.getAttribute('data-sitekey'), recaptchaElement);
        console.log(`Found reCAPTCHA sitekey: ${sitekey}`);

        // TODO: Implement reCAPTCHA solving logic here
        // You'll need to modify solveCaptcha function to handle reCAPTCHA
        // or create a new function specifically for reCAPTCHA
    } else {
        console.log('✅ No reCAPTCHA detected, continuing...');
    }

    // Step 1: Check for CAPTCHA
    const captchaSelector = 'img#captcha-image'; // Update if needed
    const captchaElement = await page.$(captchaSelector);

    // if (captchaElement) {
        console.log('⚠️ CAPTCHA detected! Solving...');

        // Extract CAPTCHA Image URL
        const imageUrl = await page.evaluate(img => img.src, captchaElement);

        // Solve CAPTCHA using 2Captcha
        const captchaSolution = await solveCaptcha(imageUrl);

        if (captchaSolution) {
            // Enter CAPTCHA solution
            await page.type('input#captcha-input', captchaSolution); // Adjust selector
            await page.click('button#captcha-submit'); // Adjust selector

            console.log('✅ CAPTCHA solved and submitted!');

            // Wait for navigation after CAPTCHA submission
            await page.waitForNavigation({ waitUntil: 'networkidle2' });
        } else {
            console.log('❌ CAPTCHA solving failed!');
            await browser.close();
            return;
        }
    // } else {
    //     console.log('✅ No CAPTCHA detected, continuing...');
    // }

    console.log('🎯 Page loaded successfully!');
    await browser.close();
}

// Run with a test URL
bypassCaptcha('https://www.deepcoder.io/contact-us'); // Change URL

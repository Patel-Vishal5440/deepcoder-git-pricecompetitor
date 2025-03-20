import puppeteer from 'puppeteer-extra';

(async () => {
    try {
        const browser = await puppeteer.launch({ headless: true });
        const page = await browser.newPage();

        await page.setUserAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

        const url = 'https://www.phonelcdparts.com/iphone-16-pro-max-dual-layers-hybrid-case-w-metal-ring-and-camera-protector-black-only-ground-shipping-16pm-ks923-red'; // Change this to your target URL
        await page.goto(url, { waitUntil: 'domcontentloaded' });

        await page.waitForSelector('.price-wrapper .price');

        const price = await page.evaluate(() => {

            const textPrice = document.querySelector('.price-wrapper .price')?.innerText.trim() || 'Price not found';

            const numericPrice = document.querySelector('.price-wrapper')?.getAttribute('data-price-amount') || 'N/A';

            return { textPrice, numericPrice };
        });

        console.log(`Extracted Price: ${price.textPrice} (Numeric: ${price.numericPrice})`);

        await browser.close();
    } catch (error) {
        console.error('Error scraping product price:', error);
    }
})();

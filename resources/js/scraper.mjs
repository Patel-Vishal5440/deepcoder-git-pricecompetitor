import puppeteer from 'puppeteer-extra';
import StealthPlugin from 'puppeteer-extra-plugin-stealth';

puppeteer.use(StealthPlugin());

const args = process.argv.slice(2);
const url = args[0];

if (!url) {
    console.error("No URL provided");
    process.exit(1);
}

// Proxy & User-Agent Rotation
const proxies = [
    'http://proxy1:port',
    'http://proxy2:port',
    'http://proxy3:port'
];
const randomProxy = proxies[Math.floor(Math.random() * proxies.length)];

const userAgents = [
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
    'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
    'Mozilla/5.0 (Linux; Android 10)'
];

const browser = await puppeteer.launch({
    headless: true,
    args: [
        '--no-sandbox',
        '--disable-setuid-sandbox',
        `--proxy-server=${randomProxy}`
    ]
});

try {
    const page = await browser.newPage();
    await page.setUserAgent(userAgents[Math.floor(Math.random() * userAgents.length)]);
    await page.setExtraHTTPHeaders({
        'Referer': 'https://www.google.com/',
        'Accept-Language': 'en-US,en;q=0.9'
    });

    await page.goto(url, { waitUntil: 'networkidle2', timeout: 60000 });

    if (await page.$('.captcha')) {
        console.log('CAPTCHA detected, solving...');
        await solveCaptcha(page);
    }

    const price = await page.$eval('.price-selector', el => el.innerText.trim());

    console.log(JSON.stringify({ price }));
} catch (error) {
    console.error("Error scraping: ", error);
} finally {
    await browser.close();
}

async function solveCaptcha(page) {
    console.log('Solving CAPTCHA...');
}

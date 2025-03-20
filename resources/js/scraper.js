import puppeteer from 'puppeteer-extra';
import StealthPlugin from 'puppeteer-extra-plugin-stealth';
import RecaptchaPlugin from 'puppeteer-extra-plugin-recaptcha';
import randomUseragent from 'random-useragent';

puppeteer.use(StealthPlugin());

puppeteer.use(
    RecaptchaPlugin({
        provider: {
            id: '2captcha',
            token: 'YOUR_2CAPTCHA_API_KEY'
        },
        visualFeedback: true
    })
);

const proxyList = [
    'http://user:pass@proxy1.com:8080',
    'http://user:pass@proxy2.com:8080',
    'http://user:pass@proxy3.com:8080'
];

const args = process.argv;
const url = args[2];

if (!url) {
    console.error('No URL provided.');
    process.exit(1);
}

(async () => {
    try {
        const proxy = proxyList[Math.floor(Math.random() * proxyList.length)];
        const browser = await puppeteer.launch({
            headless: true,
            args: [
                `--proxy-server=${proxy}`,
                '--no-sandbox',
                '--disable-setuid-sandbox'
            ]
        });

        const page = await browser.newPage();
        await page.setUserAgent(randomUseragent.getRandom());
        await page.goto(url, { waitUntil: 'domcontentloaded', timeout: 60000 });

        // Solve reCAPTCHA if present
        await page.solveRecaptchas();

        let price = await page.evaluate(() => {
            let priceElement = document.querySelector('.price'); // Modify selector as needed
            return priceElement ? priceElement.innerText.replace(/[^0-9.]/g, '') : null;
        });

        await browser.close();

        console.log(JSON.stringify({ price }));
    } catch (error) {
        console.error('Error:', error);
        process.exit(1);
    }
})();

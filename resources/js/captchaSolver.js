import axios from 'axios';

// Replace with your 2Captcha API Key
const API_KEY = '07ebb2281e3e5ec009d251960e395fe9';

export async function solveCaptcha(imageUrl) {
    try {
        console.log('🔄 Sending CAPTCHA for solving...');

        // Step 1: Send CAPTCHA to 2Captcha
        const response = await axios.post('http://2captcha.com/in.php', null, {
            params: {
                key: API_KEY,
                method: 'base64',
                body: imageUrl, // Pass the CAPTCHA image as base64
                json: 1
            }
        });

        if (response.data.status !== 1) {
            console.log('❌ Failed to submit CAPTCHA');
            return null;
        }

        const captchaId = response.data.request;

        // Step 2: Wait and retrieve CAPTCHA solution
        console.log('⏳ Waiting for CAPTCHA solution...');
        await new Promise(resolve => setTimeout(resolve, 5000)); // Wait before checking result

        while (true) {
            const result = await axios.get('http://2captcha.com/res.php', {
                params: {
                    key: API_KEY,
                    action: 'get',
                    id: captchaId,
                    json: 1
                }
            });

            if (result.data.status === 1) {
                console.log('✅ CAPTCHA Solved:', result.data.request);
                return result.data.request;
            }

            console.log('⏳ Still waiting...');
            await new Promise(resolve => setTimeout(resolve, 5000)); // Wait and retry
        }
    } catch (error) {
        console.log('🚨 Error solving CAPTCHA:', error.message);
        return null;
    }
}

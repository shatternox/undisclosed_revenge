const express = require('express')
const puppeteer = require('puppeteer')
const app = express()

const port = 3000

const cookie = {
    'name': 'special_admin_cookie',
    'value': 'nYyjJdJoeMvftXFuY9mt',
}

const sleep = (ms) => {
  return new Promise(resolve => {setTimeout(resolve, ms)})
}


const monitorConsoleOutput = async (botData) => {
    await botData.on('console', async msg => {
        msg.args().forEach(arg => {
            arg.jsonValue().then(_arg => {
                console.log(`[$] Console Output: `, _arg);
            });
        });
    });
}

app.get('/adminspecialpath', async (req, res) => {

    const browser = await puppeteer.launch({args: ['--no-sandbox', '--disable-setuid-sandbox']});
    const page = await browser.newPage();

    res.status(200).send(`${req.query.id}`)
    res.end()

    monitorConsoleOutput(page)

    try {
        await page.tracing.start({ path: `/tmp/${new Date()}-trace.json` });            
      } catch (error) {
          
      }

    page.on('error', err => {
        console.error(`[#] Error: `, err);
    });

    page.on('pageerror', msg => {
        console.error(`[-] Page Error: `, msg);
    });

    page.on('dialog', async dialog => {
        console.debug(`[#] Dialog: [${dialog.type()}] "${dialog.message()}" ${dialog.defaultValue() || ""}`);
        dialog.dismiss();
    });

    page.on('requestfailed', req => {
        console.error(`[-] Request failed: ${req.url()} ${JSON.stringify(req.failure())}`);
    });


    // For Docker 172.16.47.14:80
    const url = "http://localhost:1234/order.php?id=" + req.query.id 

    await page.goto("http://localhost:1234/");
    await page.setCookie(cookie);

    try{
      await page.goto(url, {waitUntil:"load"});
    } catch(err){
      console.log(err);
    }

    await sleep(5000);
    await browser.close();
    

})


app.listen(port, () => {
  console.log(`Admin server running on ${port}`)
  
})




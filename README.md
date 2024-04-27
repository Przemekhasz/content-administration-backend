General Information
-------------------

This is an application to manage the content of a website. In the backend layer, there are many options for configuring your website, portfolio, business card, etc. For frontend layer, please refer to [this link](https://github.com/Przemekhasz/content-administration-frontend).

Hello! Welcome to the cockpit where you will create your dream website! Personalize and manage your site efficiently.

Hi! 😎 Here you can create content for your website, portfolio, business card, whatever you want! The only limitation is your imagination, and if your imagination exceeds the capabilities of this site, don't worry, just contact us and we'll make your dreams come true.

The frontend layer is a separate module available at [this address](https://github.com/Przemekhasz/content-administration-frontend). Here you can manipulate the content of the site, such as:

*   Upload logos
*   Upload banners
*   Create menus
*   Create descriptions
*   Receive messages from contact forms and respond to them
*   Create photo galleries with descriptions, tags, and categories
*   Create a set of projects/realizations to showcase and present attractively
*   Run a blog
*   Change colors, general styles of the site
*   Customize email templates to your needs
*   Change fonts
*   Attach animations

Running Commands
----------------
**Build:**
```bash
make build
```
**Up:**
```bash
make up
```
**CS Fixer:**
```bash
make csfixer
```
**Down:**
```bash
make down
```
**Rebuild:**
```bash
make rebuild
```

Deployment
----------

*   **Deploy Development:** 
```bash
make init
```

Environment Variables
---------------------
```bash
XDEBUG: true
IMG\_UPLOADS\_DIR: '/uploads/img'
PAGE\_URL: 'https://127.0.0.1:8000'
PAGE\_NAME: 'localhost'
FULL\_NAME: 'John Doe'
EMAIL\_ADDRESS: 'data@gmail.com'
```

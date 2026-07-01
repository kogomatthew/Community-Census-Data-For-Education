# Mathew Kogo — Personal Portfolio Website

A modern, responsive portfolio site built from Mathew Kogo's professional resume.

## Live Preview

Open `index.html` in a browser, or serve locally:

```bash
cd website
python3 -m http.server 8080
```

Then visit [http://localhost:8080](http://localhost:8080).

## Deployment

This is a static site — deploy the `website/` folder to any static host:

- **GitHub Pages**: Set the publish directory to `/website`
- **Netlify / Vercel**: Point the root to the `website` folder
- **Any web server**: Upload the contents of `website/` to your document root

## Structure

```
website/
├── index.html    # Main page
├── styles.css    # Styles
├── script.js     # Navigation & scroll animations
└── README.md     # This file
```

## Customization

- Update the LinkedIn URL in `index.html` if your profile link differs
- Adjust colors in the `:root` CSS variables in `styles.css`

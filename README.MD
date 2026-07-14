# View Counter
[![img](https://img.shields.io/badge/-docker-blue?style=for-the-badge&logo=docker&logoColor=white)](https://www.docker.com/)
[![img](https://img.shields.io/badge/-php-blue?style=for-the-badge&logo=php&logoColor=white)](https://www.docker.com/)

## Author
Maxim Antonisin <br>
[![img](https://img.shields.io/badge/-maxim.antonisin%40gmail.com-blue?style=for-the-badge&logo=gmail)](mailto:maxim.antonisin@gmail.com) <br>
[![img](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/mantonishin/)

## Description
This repository contains a simple view counter that tracks the number of clicks, views, and visits for a web page. 
With this tool, you can easily keep track of how many people are accessing your web page and gain insight into how users
are interacting with your content. The view counter is easy to integrate into any website, and can be customized to suit
your specific needs. 

I'm grateful to **Alexandr** for creating this **Cool, Fantastic, Fabulous, Excellent, Splendid, 
Superb, Phenomenal, Amazing, Outstanding, Terrific, Wonderful, Awesome and Perfect project.**

## Use
### Config
Copy `.env.example` to `.env` and adjust values:
```bash
cp .env.example .env
```

### URL
#### View counter
```
http://localhost:8000/view.php
```
#### Counter url
```
http://localhost:8000/counter.php
```

## Development

Start local environment (build image from source, expose port from `HOST_PORT`):
```bash
docker compose -f docker-compose.prod.yml -f docker-compose.build.yml up --build -d
```

Stop:
```bash
docker compose down
```

### URLs
- http://localhost:8000/view.php — View counter stats
- http://localhost:8000/counter.php — Increment counter

---

## Production

Start production environment (image-only compose, external reverse-proxy network):
```bash
docker compose -f docker-compose.prod.yml up -d
```

Stop:
```bash
docker compose down
```

---

## CI/CD

Push to `main` → GitHub Actions validates compose + Dockerfile, builds/pushes image to registry, then triggers Komodo redeploy webhook.

### Required GitHub Variables

Go to **Settings → Secrets and variables → Actions → Variables** and add:

| Variable | Description |
|--------|-------------|
| `REGISTRY_HOST` | Container registry host |
| `REGISTRY_USERNAME` | Registry user |
| `REGISTRY_PASSWORD` | Registry password/token |
| `KOMODO_DEPLOY_WEBHOOK` | Komodo deploy webhook URL |

### Manual Deploy

```bash
export IMAGE=${REGISTRY_HOST}/alexandr-counter-app
docker pull ${REGISTRY_HOST}/alexandr-counter-app:latest
docker compose -f docker-compose.prod.yml up -d
```

---

## Styling

The UI uses Bootstrap 4.5 enhanced with a custom dark theme (`src/css/style.css`).
The custom CSS improves buttons, table layout, stats display, and overall spacing — without replacing Bootstrap.

## Support
<a href="https://www.buymeacoffee.com/maximusCode"> <img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" height="50" width="210" alt="sleepwalker" style="margin-right: 12px;" /></a>
<a href='https://ko-fi.com/maximusCode' target='_blank'><img  height="50" width="210" src='https://cdn.ko-fi.com/cdn/kofi4.png?v=3' border='0' alt='Buy Me a Coffee at ko-fi.com' /></a>

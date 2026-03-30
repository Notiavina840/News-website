# News-website
SEO and URL rewriting practice

## Running locally

```
docker compose up --build
```

The app is served at http://localhost:8080 via Nginx + PHP-FPM. Postgres is pre-seeded from db/init.sql.

## Backoffice access

- Login page: http://localhost:8080/login.php
- Default credentials: admin / admin
- After sign-in, you are redirected to dashboard.php; use logout.php to end the session.

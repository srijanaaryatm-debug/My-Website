# Dynamic Local Web Hub

A dynamic locally hostable website created with **HTML, CSS, JavaScript, jQuery, AJAX, and PHP**.

## Features

- Live dashboard with clock/date/session visit counter
- AJAX-powered task manager (CRUD-lite)
- Notes area stored in browser localStorage
- Contact form with PHP validation and local JSON persistence
- Weather lookup powered by a PHP AJAX endpoint
- AI chatbot:
  - Uses OpenAI API when `OPENAI_API_KEY` is available
  - Falls back to a local smart response engine when API key is not set

## Run locally

```bash
php -S 0.0.0.0:8000
```

Then open:

- `http://localhost:8000`

## API Endpoints

- `GET|POST|DELETE /api/todo.php`
- `POST /api/contact.php`
- `GET /api/weather.php?city=...`
- `POST /api/chatbot.php`

## Notes

- Data is saved under `data/` in JSON files.
- This project is intentionally dependency-light and suitable for local hosting.

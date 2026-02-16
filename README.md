<<<<<<< HEAD
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
=======
# Raptor CareSuite (Aegis-Style Dynamic HMS Website)

A dynamic locally hostable website inspired by enterprise hospital management product layouts, built using:

- HTML
- CSS
- JavaScript
- jQuery
- AJAX
- PHP

## Highlights

- Sticky navigation with smooth scrolling and responsive mobile menu
- Hero + live operations pulse card (time/date/session/emergency queue)
- Animated KPI counters
- Dynamic HMS module cards generated from PHP arrays
- AI chatbot (OpenAI-backed when `OPENAI_API_KEY` is set, local fallback otherwise)
- AJAX weather lookup with generated operations broadcast advisory
- AJAX task command center with JSON persistence
- Admin notes saved via localStorage
- AJAX contact/demo request form persisted to JSON
- Theme toggle (dark/light)
- Footer branding: `Developed By-Raptor Webcraft Technologies,2026-Copyright`
>>>>>>> codex/create-dynamic-hostable-website-with-ai-chatbot

## Run locally

```bash
php -S 0.0.0.0:8000
```

<<<<<<< HEAD
Then open:

- `http://localhost:8000`
=======
Open:

- http://localhost:8000
>>>>>>> codex/create-dynamic-hostable-website-with-ai-chatbot

## API Endpoints

- `GET|POST|DELETE /api/todo.php`
- `POST /api/contact.php`
- `GET /api/weather.php?city=...`
- `POST /api/chatbot.php`

<<<<<<< HEAD
## Notes

- Data is saved under `data/` in JSON files.
- This project is intentionally dependency-light and suitable for local hosting.
=======
## Data storage

JSON data is stored in:

- `data/todos.json`
- `data/messages.json`
>>>>>>> codex/create-dynamic-hostable-website-with-ai-chatbot

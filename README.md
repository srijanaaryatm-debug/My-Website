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

## Run locally

```bash
php -S 0.0.0.0:8000
```

Open:

- http://localhost:8000

## API Endpoints

- `GET|POST|DELETE /api/todo.php`
- `POST /api/contact.php`
- `GET /api/weather.php?city=...`
- `POST /api/chatbot.php`

## Data storage

JSON data is stored in:

- `data/todos.json`
- `data/messages.json`

<?php
$year = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Local Web Hub</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
  <header class="hero">
    <div class="container">
      <h1>Dynamic Local Web Hub</h1>
      <p>A locally hostable full-stack website using HTML, CSS, JavaScript, jQuery, AJAX, and PHP.</p>
      <a href="#dashboard" class="btn">Explore Features</a>
    </div>
  </header>

  <main id="dashboard" class="container grid-layout">
    <section class="card" id="live-stats">
      <h2>Live Dashboard</h2>
      <div class="stats-grid">
        <div>
          <span class="stat-label">Current Time</span>
          <strong id="clock">--:--:--</strong>
        </div>
        <div>
          <span class="stat-label">Today</span>
          <strong id="todayDate">--</strong>
        </div>
        <div>
          <span class="stat-label">Visits (session)</span>
          <strong id="visitsCount">0</strong>
        </div>
      </div>
    </section>

    <section class="card" id="todo-section">
      <h2>AJAX Task Manager</h2>
      <form id="todoForm" class="inline-form">
        <input type="text" id="todoInput" placeholder="Add a new task" required>
        <button type="submit" class="btn">Add</button>
      </form>
      <ul id="todoList" class="list"></ul>
    </section>

    <section class="card" id="notes-section">
      <h2>Quick Notes (LocalStorage)</h2>
      <textarea id="notePad" rows="6" placeholder="Type notes here..."></textarea>
      <button id="saveNoteBtn" class="btn">Save Notes</button>
      <p id="noteStatus" class="status"></p>
    </section>

    <section class="card" id="contact-section">
      <h2>Contact Form (PHP + AJAX)</h2>
      <form id="contactForm">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="message" rows="4" placeholder="Message" required></textarea>
        <button type="submit" class="btn">Send Message</button>
      </form>
      <p id="contactFeedback" class="status"></p>
    </section>

    <section class="card" id="weather-section">
      <h2>Weather Lookup (AJAX)</h2>
      <form id="weatherForm" class="inline-form">
        <input type="text" id="cityInput" placeholder="Enter city e.g. London" required>
        <button type="submit" class="btn">Get Weather</button>
      </form>
      <div id="weatherResult" class="result-box"></div>
    </section>

    <section class="card" id="chatbot-section">
      <h2>AI Chatbot</h2>
      <p class="muted">If <code>OPENAI_API_KEY</code> is set in your environment, it uses AI; otherwise it uses a smart local fallback bot.</p>
      <div id="chatLog" class="chat-log"></div>
      <form id="chatForm" class="inline-form">
        <input type="text" id="chatInput" placeholder="Ask me anything..." required>
        <button type="submit" class="btn">Send</button>
      </form>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; <?php echo htmlspecialchars($year, ENT_QUOTES, 'UTF-8'); ?> Dynamic Local Web Hub</p>
    </div>
  </footer>

  <script src="assets/js/app.js"></script>
</body>
</html>

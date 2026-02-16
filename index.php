<?php
$year = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aegis-Style Dynamic Web Hub</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<<<<<<< HEAD
  <div class="bg-orb orb-1"></div>
  <div class="bg-orb orb-2"></div>

  <header class="hero" id="top">
    <div class="container">
      <div class="top-strip">
        <span class="pulse-dot"></span>
        <span>System Status: <strong>Operational</strong></span>
        <span class="divider">|</span>
        <span id="heroClock">--:--:--</span>
      </div>

      <h1>Next-Gen Dynamic Web Experience</h1>
      <p class="hero-subtitle">Inspired by modern animated enterprise layouts with a real-time dashboard, live counters, interactive utilities, and smooth micro-animations.</p>

      <div class="hero-cta-row">
        <a href="#dashboard" class="btn">Launch Dashboard</a>
        <a href="#utility-grid" class="btn btn-outline">Try Utilities</a>
      </div>

      <div class="hero-metrics">
        <div>
          <span class="metric-label">Active Sessions</span>
          <strong id="activeSessions">0</strong>
        </div>
        <div>
          <span class="metric-label">Threats Blocked</span>
          <strong id="threatCounter">0</strong>
        </div>
        <div>
          <span class="metric-label">Current Date</span>
          <strong id="todayDate">--</strong>
        </div>
      </div>
=======
  <div class="aurora-bg" aria-hidden="true">
    <span class="orb orb-1"></span>
    <span class="orb orb-2"></span>
    <span class="orb orb-3"></span>
  </div>

  <header class="hero">
    <div class="container">
      <h1>Dynamic Local Web Hub</h1>
      <p class="hero-subtitle">A locally hostable full-stack website using HTML, CSS, JavaScript, jQuery, AJAX, and PHP.</p>
      <p class="typing-line">Built for <span id="typedText" aria-live="polite"></span><span class="caret" aria-hidden="true"></span></p>
      <a href="#dashboard" class="btn">Explore Features</a>
>>>>>>> codex/make-website-dynamic-like-aegishms.com
    </div>
  </header>

  <main>
    <section id="dashboard" class="container dashboard-grid reveal-on-scroll">
      <article class="card card-wide">
        <h2>Live System Dashboard</h2>
        <div class="stats-grid">
          <div>
            <span class="stat-label">Local Time</span>
            <strong id="clock">--:--:--</strong>
          </div>
          <div>
            <span class="stat-label">Today</span>
            <strong id="todayDateSecondary">--</strong>
          </div>
          <div>
            <span class="stat-label">Visits (session)</span>
            <strong id="visitsCount">0</strong>
          </div>
        </div>
      </article>

      <article class="card reveal-on-scroll">
        <h2>Dynamic Risk Feed</h2>
        <ul id="riskFeed" class="risk-feed"></ul>
      </article>

      <article class="card reveal-on-scroll">
        <h2>Response Readiness</h2>
        <div class="progress-wrap">
          <p><span>Endpoint Monitoring</span><strong id="p1Label">0%</strong></p>
          <div class="progress"><div id="p1"></div></div>
        </div>
        <div class="progress-wrap">
          <p><span>Incident Automation</span><strong id="p2Label">0%</strong></p>
          <div class="progress"><div id="p2"></div></div>
        </div>
        <div class="progress-wrap">
          <p><span>Threat Intelligence</span><strong id="p3Label">0%</strong></p>
          <div class="progress"><div id="p3"></div></div>
        </div>
      </article>
    </section>

    <section id="utility-grid" class="container grid-layout reveal-on-scroll">
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

      <section class="card card-span-2" id="chatbot-section">
        <h2>AI Chatbot</h2>
        <p class="muted">If <code>OPENAI_API_KEY</code> is set in your environment, it uses AI; otherwise it uses a smart local fallback bot.</p>
        <div id="chatLog" class="chat-log"></div>
        <form id="chatForm" class="inline-form">
          <input type="text" id="chatInput" placeholder="Ask me anything..." required>
          <button type="submit" class="btn">Send</button>
        </form>
      </section>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; <?php echo htmlspecialchars($year, ENT_QUOTES, 'UTF-8'); ?> Aegis-Style Dynamic Web Hub</p>
      <p>Developed By-Raptor Webcraft Technologies,2026-Copyright</p>
    </div>
  </footer>

  <script src="assets/js/app.js"></script>
</body>
</html>

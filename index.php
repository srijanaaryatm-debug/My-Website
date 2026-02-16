<?php
$year = date('Y');
<<<<<<< HEAD
=======
$modules = [
    ['title' => 'Patient Registration', 'desc' => 'Digital onboarding, UHID creation, and smart queue assignment in seconds.'],
    ['title' => 'OPD/IPD Management', 'desc' => 'Manage appointments, billing, and care workflows with role-based access.'],
    ['title' => 'Pharmacy & Inventory', 'desc' => 'Track medicine batches, expiries, and low-stock alerts in real-time.'],
    ['title' => 'Laboratory', 'desc' => 'Sample lifecycle tracking, report validation, and secure patient sharing.'],
    ['title' => 'Insurance & TPA', 'desc' => 'Pre-auth workflows and claims tracking with transparent status timelines.'],
    ['title' => 'Analytics Dashboard', 'desc' => 'Actionable KPIs for occupancy, revenue, patient flow, and utilization.'],
];
>>>>>>> codex/create-dynamic-hostable-website-with-ai-chatbot
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
  <title>Dynamic Local Web Hub</title>
=======
  <title>Aegis-Style Dynamic HMS Platform</title>
>>>>>>> codex/create-dynamic-hostable-website-with-ai-chatbot
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<<<<<<< HEAD
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
=======
  <header class="site-header">
    <div class="container nav-wrap">
      <a href="#home" class="brand">Raptor CareSuite</a>
      <button id="mobileNavBtn" class="mobile-btn" aria-label="Toggle navigation">☰</button>
      <nav id="topNav">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#modules">Modules</a>
        <a href="#automation">Automation</a>
        <a href="#workspace">Workspace</a>
        <a href="#contact">Contact</a>
      </nav>
    </div>
  </header>

  <section id="home" class="hero">
    <div class="overlay"></div>
    <div class="container hero-grid">
      <div>
        <p class="eyebrow">Hospital Management Platform</p>
        <h1>Dynamic, Secure & Locally Hostable Healthcare Workflow Suite</h1>
        <p class="lead">Built with HTML, CSS, JavaScript, jQuery, AJAX, and PHP. Inspired by enterprise HMS experiences with richer local customization.</p>
        <div class="hero-actions">
          <a href="#modules" class="btn">Explore Modules</a>
          <button id="themeToggle" class="btn alt">Toggle Theme</button>
        </div>
      </div>
      <div class="glass-card status-card">
        <h3>Live Operations Pulse</h3>
        <div class="pulse-grid">
          <div><span>Server Time</span><strong id="clock">--:--:--</strong></div>
          <div><span>Today</span><strong id="todayDate">--</strong></div>
          <div><span>Session Visits</span><strong id="visitsCount">0</strong></div>
          <div><span>Emergency Queue</span><strong id="emergencyQueue">--</strong></div>
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="section container">
    <div class="section-head">
      <p class="eyebrow">Why Choose This Build</p>
      <h2>Enterprise Look, Local Flexibility</h2>
    </div>
    <div class="kpi-grid">
      <article class="kpi"><h3 data-target="99.9">0</h3><p>Uptime Focus (%)</p></article>
      <article class="kpi"><h3 data-target="24">0</h3><p>Workflow Modules</p></article>
      <article class="kpi"><h3 data-target="350">0</h3><p>Daily OPD Capacity</p></article>
      <article class="kpi"><h3 data-target="1200">0</h3><p>Records / Minute Sync</p></article>
    </div>
  </section>

  <section id="modules" class="section section-dark">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">Core Capabilities</p>
        <h2>HMS Modules</h2>
      </div>
      <div class="module-grid">
        <?php foreach ($modules as $module): ?>
          <article class="module-card">
            <h3><?php echo htmlspecialchars($module['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <p><?php echo htmlspecialchars($module['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="automation" class="section container">
    <div class="section-head">
      <p class="eyebrow">AI + Automation</p>
      <h2>Smart Assistant + Dynamic Integrations</h2>
    </div>
    <div class="automation-grid">
      <article class="card">
        <h3>AI Chatbot</h3>
        <p class="muted">If <code>OPENAI_API_KEY</code> exists, this uses AI responses; otherwise, it runs local fallback intelligence.</p>
        <div id="chatLog" class="chat-log"></div>
        <form id="chatForm" class="inline-form">
          <input type="text" id="chatInput" placeholder="Ask about patient flow, billing, analytics..." required>
          <button type="submit" class="btn">Send</button>
        </form>
      </article>

      <article class="card">
        <h3>Weather & Preparedness</h3>
        <form id="weatherForm" class="inline-form">
          <input type="text" id="cityInput" placeholder="Enter city" required>
          <button type="submit" class="btn">Check Weather</button>
        </form>
        <div id="weatherResult" class="result-box"></div>
        <hr>
        <h4>Broadcast Draft</h4>
        <p id="broadcastText" class="muted">Weather-ready announcements appear here.</p>
      </article>
    </div>
  </section>

  <section id="workspace" class="section section-dark">
    <div class="container workspace-grid">
      <article class="card">
        <h3>Task Command Center</h3>
        <form id="todoForm" class="inline-form">
          <input type="text" id="todoInput" placeholder="Add operational task" required>
          <button type="submit" class="btn">Add Task</button>
        </form>
        <ul id="todoList" class="list"></ul>
      </article>

      <article class="card">
        <h3>Admin Notes</h3>
        <textarea id="notePad" rows="7" placeholder="Store handover notes, instructions, escalation details..."></textarea>
        <button id="saveNoteBtn" class="btn">Save Notes</button>
        <p id="noteStatus" class="status"></p>
      </article>

      <article id="contact" class="card">
        <h3>Demo Request / Contact</h3>
        <form id="contactForm">
          <input type="text" name="name" placeholder="Name" required>
          <input type="email" name="email" placeholder="Email" required>
          <textarea name="message" rows="4" placeholder="Tell us your hospital size and needs" required></textarea>
          <button type="submit" class="btn">Submit</button>
        </form>
        <p id="contactFeedback" class="status"></p>
      </article>
    </div>
  </section>

  <footer>
    <div class="container footer-wrap">
      <p>Developed By-Raptor Webcraft Technologies,2026-Copyright</p>
      <small>&copy; <?php echo htmlspecialchars($year, ENT_QUOTES, 'UTF-8'); ?> Raptor CareSuite</small>
>>>>>>> codex/create-dynamic-hostable-website-with-ai-chatbot
    </div>
  </footer>

  <script src="assets/js/app.js"></script>
</body>
</html>

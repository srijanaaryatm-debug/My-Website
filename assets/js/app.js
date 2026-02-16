$(function () {
  const todoApi = 'api/todo.php';

  function refreshClock() {
    const now = new Date();
    $('#clock').text(now.toLocaleTimeString());
    $('#todayDate').text(now.toLocaleDateString());
    $('#emergencyQueue').text(Math.floor((now.getSeconds() * 7) % 18) + 2);
  }

  function incrementVisits() {
    const visits = Number(sessionStorage.getItem('visits') || 0) + 1;
    sessionStorage.setItem('visits', String(visits));
    $('#visitsCount').text(visits);
  }

  function animateCounters() {
    $('.kpi h3').each(function () {
      const element = $(this);
      const target = Number(element.data('target'));
      let current = 0;
      const step = Math.max(target / 80, 1);
      const timer = setInterval(function () {
        current += step;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        const formatted = Number.isInteger(target)
          ? Math.round(current).toString()
          : current.toFixed(1);
        element.text(formatted);
      }, 18);
    });
  }

  function loadTodos() {
    $.getJSON(todoApi, function (res) {
      const list = $('#todoList');
      list.empty();
      if (!Array.isArray(res.todos) || res.todos.length === 0) {
        list.append('<li>No operational tasks yet.</li>');
        return;
      }

      res.todos.forEach(function (todo) {
        const item = $('<li></li>');
        item.append(`<span>${todo.text}</span>`);
        const delBtn = $('<button class="small-btn">Done</button>');
        delBtn.on('click', function () {
          $.ajax({
            url: todoApi,
            method: 'DELETE',
            data: { id: todo.id }
          }).done(loadTodos);
        });
        item.append(delBtn);
        list.append(item);
      });
    });
  }

  $('#todoForm').on('submit', function (e) {
    e.preventDefault();
    $.post(todoApi, { text: $('#todoInput').val() }, function () {
      $('#todoInput').val('');
      loadTodos();
    }, 'json');
  });

  $('#saveNoteBtn').on('click', function () {
    localStorage.setItem('quick-note', $('#notePad').val());
    $('#noteStatus').text('Notes saved locally.').removeClass('error').addClass('success');
  });

  $('#notePad').val(localStorage.getItem('quick-note') || '');

  $('#contactForm').on('submit', function (e) {
    e.preventDefault();
    const payload = $(this).serialize();
    $.post('api/contact.php', payload, function (res) {
      $('#contactFeedback').text(res.message).removeClass('error').addClass('success');
      $('#contactForm')[0].reset();
    }, 'json').fail(function (xhr) {
      $('#contactFeedback')
        .text(xhr.responseJSON?.message || 'Failed to submit request.')
        .removeClass('success')
        .addClass('error');
    });
  });

  $('#weatherForm').on('submit', function (e) {
    e.preventDefault();
    const city = $('#cityInput').val().trim();

    $.getJSON('api/weather.php', { city: city }, function (res) {
      $('#weatherResult').html(
        `<p><strong>${res.city}</strong></p>
         <p>Temperature: ${res.temperature}°C | Humidity: ${res.humidity}%</p>
         <p>Condition: ${res.condition}</p>`
      );

      $('#broadcastText').text(`Weather advisory for ${res.city}: ${res.condition} conditions with ${res.temperature}°C. Plan OPD alerts and ambulance routing accordingly.`);
    }).fail(function () {
      $('#weatherResult').html('<p class="error">Unable to fetch weather now.</p>');
      $('#broadcastText').text('No advisory generated yet.');
    });
  });

  function appendChat(role, text) {
    const safeText = $('<div>').text(text).html();
    $('#chatLog').append(`<div class="msg ${role}"><strong>${role === 'user' ? 'You' : 'CareBot'}:</strong> ${safeText}</div>`);
    const log = $('#chatLog')[0];
    log.scrollTop = log.scrollHeight;
  }

  $('#chatForm').on('submit', function (e) {
    e.preventDefault();
    const input = $('#chatInput').val().trim();
    if (!input) return;
    appendChat('user', input);
    $('#chatInput').val('');

    $.post('api/chatbot.php', { message: input }, function (res) {
      appendChat('bot', res.reply);
    }, 'json').fail(function (xhr) {
      appendChat('bot', xhr.responseJSON?.reply || 'Chat service unavailable right now.');
    });
  });

  $('#mobileNavBtn').on('click', function () {
    $('#topNav').toggleClass('open');
  });

  $('#topNav a').on('click', function () {
    $('#topNav').removeClass('open');
  });

  $('#themeToggle').on('click', function () {
    $('body').toggleClass('light');
    const isLight = $('body').hasClass('light');
    localStorage.setItem('theme-mode', isLight ? 'light' : 'dark');
  });

  if (localStorage.getItem('theme-mode') === 'light') {
    $('body').addClass('light');
  }

  setInterval(refreshClock, 1000);
  refreshClock();
  incrementVisits();
  animateCounters();
  loadTodos();
  appendChat('bot', 'Welcome to Raptor CareSuite assistant. Ask me about HMS modules, automation, or setup.');
});

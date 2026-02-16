$(function () {
  const todoApi = 'api/todo.php';

  function startTypingAnimation() {
    const words = ['fast teams.', 'smarter workflows.', 'modern web experiences.'];
    const target = $('#typedText');
    if (!target.length) return;

    let wordIndex = 0;
    let charIndex = 0;
    let deleting = false;

    function tick() {
      const currentWord = words[wordIndex];
      if (deleting) {
        charIndex -= 1;
      } else {
        charIndex += 1;
      }

      target.text(currentWord.slice(0, charIndex));

      if (!deleting && charIndex === currentWord.length) {
        deleting = true;
        setTimeout(tick, 1200);
        return;
      }

      if (deleting && charIndex === 0) {
        deleting = false;
        wordIndex = (wordIndex + 1) % words.length;
      }

      setTimeout(tick, deleting ? 55 : 95);
    }

    tick();
  }

  function animateCardsOnScroll() {
    const cards = document.querySelectorAll('.card');
    if (!cards.length) return;

    if (!('IntersectionObserver' in window)) {
      cards.forEach((card) => card.classList.add('is-visible'));
      return;
    }

    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.16 });

    cards.forEach((card) => observer.observe(card));
  }

  function setupSmoothScroll() {
    $('a[href^="#"]').on('click', function (e) {
      const target = $(this.getAttribute('href'));
      if (!target.length) return;
      e.preventDefault();
      $('html, body').animate({ scrollTop: target.offset().top - 20 }, 600);
    });
  }

  function refreshClock() {
    const now = new Date();
    $('#clock').text(now.toLocaleTimeString());
    $('#todayDate').text(now.toLocaleDateString());
  }

  function incrementVisits() {
    const visits = Number(sessionStorage.getItem('visits') || 0) + 1;
    sessionStorage.setItem('visits', String(visits));
    $('#visitsCount').text(visits);
  }

  function loadTodos() {
    $.getJSON(todoApi, function (res) {
      const list = $('#todoList');
      list.empty();
      if (!Array.isArray(res.todos) || res.todos.length === 0) {
        list.append('<li>No tasks yet.</li>');
        return;
      }
      res.todos.forEach(function (todo) {
        const item = $('<li></li>');
        item.append(`<span>${todo.text}</span>`);
        const delBtn = $('<button class="small-btn">Delete</button>');
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
      const msg = xhr.responseJSON?.message || 'Failed to send.';
      $('#contactFeedback').text(msg).removeClass('success').addClass('error');
    });
  });

  $('#weatherForm').on('submit', function (e) {
    e.preventDefault();
    const city = $('#cityInput').val();
    $.getJSON('api/weather.php', { city: city }, function (res) {
      $('#weatherResult').html(
        `<p><strong>${res.city}</strong></p>
        <p>Temperature: ${res.temperature}°C</p>
        <p>Condition: ${res.condition}</p>
        <p>Humidity: ${res.humidity}%</p>`
      );
    }).fail(function () {
      $('#weatherResult').html('<p class="error">Unable to fetch weather now.</p>');
    });
  });

  function appendChat(role, text) {
    const safeText = $('<div>').text(text).html();
    $('#chatLog').append(`<div class="msg ${role}"><strong>${role === 'user' ? 'You' : 'Bot'}:</strong> ${safeText}</div>`);
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
      appendChat('bot', xhr.responseJSON?.reply || 'The chatbot is currently unavailable.');
    });
  });

  setInterval(refreshClock, 1000);
  refreshClock();
  incrementVisits();
  startTypingAnimation();
  animateCardsOnScroll();
  setupSmoothScroll();
  loadTodos();
  appendChat('bot', 'Hello! Ask about this website, productivity, coding, or anything else.');
});

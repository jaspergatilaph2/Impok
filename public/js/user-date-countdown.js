document.addEventListener('DOMContentLoaded', function () {
  const countdownEls = document.querySelectorAll('[data-countdown]');
  if (!countdownEls.length) return;

  countdownEls.forEach(function (el) {
    const targetDate = new Date(el.dataset.date.replace(' ', 'T'));

    function updateCountdown() {
      const now = new Date();
      const diff = targetDate - now;

      if (diff <= 0) {
        el.textContent = 'Today!';
        clearInterval(timer);
        return;
      }

      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((diff % (1000 * 60)) / 1000);

      el.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s remaining`;
    }

    updateCountdown();
    const timer = setInterval(updateCountdown, 1000);
  });
});
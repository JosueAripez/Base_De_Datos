document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
      link.classList.add('active');
    });
  });
  
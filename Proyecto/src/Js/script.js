document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
      link.classList.add('active');
    });
  });



  
  let index = 0;
  const images = document.querySelectorAll('.slider-images img');
  const dots = document.querySelectorAll('.dot');
  
  function showSlide(i) {
      index = i;
      const offset = -i * 100;
      document.querySelector('.slider-images').style.transform = `translateX(${offset}%)`;
  
      dots.forEach(dot => dot.classList.remove('active'));
      dots[i].classList.add('active');
  }
  
  function currentSlide(i) {
      showSlide(i - 1);
  }
  
  // Cambia la imagen automáticamente cada 3 segundos
  setInterval(() => {
      index = (index + 1) % images.length;
      showSlide(index);
  }, 3000);
  
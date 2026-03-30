const title = document.querySelector('#title');

// Simple smooth color animation and floating effect
let hue = 0;
let direction = 1;

function animateTitle() {
  hue = (hue + 1) % 360;
  title.style.color = `hsl(${hue}, 80%, 45%)`;

  const y = 5 * Math.sin(hue * Math.PI / 180);
  title.style.transform = `translateY(${y}px)`;

  requestAnimationFrame(animateTitle);
}

function addPulseOnHover() {
  const style = document.createElement('style');
  style.innerHTML = `
    #title:hover {
      transform: scale(1.08);
      transition: transform 0.2s ease-in-out;
      text-shadow: 0 0 15px rgba(52, 152, 219, 0.6);
    }
  `;
  document.head.appendChild(style);
}

if (title) {
  title.style.transition = 'color 0.15s linear, transform 0.15s linear';
  animateTitle();
  addPulseOnHover();
}

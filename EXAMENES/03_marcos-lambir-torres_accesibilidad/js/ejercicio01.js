const buttonSubmit_HTML = document.getElementById('buttonSubmit');
const username_HTML = document.getElementById('nameID');
const msg = document.getElementById('msg');

// Event listener para el DOM
window.document.addEventListener('DOMContentLoaded', () => {
  console.log('BEFORE', username_HTML.value);
  buttonSubmit_HTML.disabled = true;

  // Event listener para change (validación final) tipo useRef()
  username_HTML.onchange = function (event) {
    if (event.target.value.trim() !== '' && isNaN(event.target.value)) {
      buttonSubmit_HTML.disabled = false;

      // Event listener para el botón (submit)
      buttonSubmit_HTML.onclick = function () {
        msg.style.visibility = 'visible';
      };
    }
    console.log('AFTER', event.target.value);
  };

  // Event listener para input (respuesta inmediata a cambios) tipo useEffect()
  // Se pone para fuera del onchange y al final, para que se ejecute siempre (para que quede siempre disabled)
  username_HTML.oninput = function (e) {
    if (e.target.value.trim() === '') {
      buttonSubmit_HTML.disabled = true;
    }
    console.log('AFTER (change)', e.target.value);
  };
});

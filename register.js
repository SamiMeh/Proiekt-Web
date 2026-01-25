const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[@$!%*?&A-Za-z\d]{8,}$/;

const emailInput = document.getElementById('email');
const dateInput = document.getElementById('dateofbirth');
const passwordInput = document.getElementById('password');
const passwordConfirmInput = document.getElementById('passwordconfirm');
const registerButton = document.getElementById('Register-button');

registerButton.onclick = function(e) {
  e.preventDefault();
  
  document.querySelectorAll('.error-msg').forEach(el => el.remove());
  document.querySelectorAll('input').forEach(el => el.style.borderColor = '');

  let valid = true;

  if (!emailRegex.test(emailInput.value)) {
    const err = document.createElement('p');
    err.className = 'error-msg';
    err.textContent = 'Email nuk eshte valid';
    err.style.color = 'red';
    err.style.fontSize = '12px';
    err.style.marginTop = '2px';
    emailInput.after(err);
    emailInput.style.borderColor = 'red';
    valid = false;
  }

  if (!dateInput.value) {
    const err = document.createElement('p');
    err.className = 'error-msg';
    err.textContent = 'Zgjidh daten e lindjes';
    err.style.color = 'red';
    err.style.fontSize = '12px';
    err.style.marginTop = '2px';
    dateInput.after(err);
    dateInput.style.borderColor = 'red';
    valid = false;
  }

  if (!passwordRegex.test(passwordInput.value)) {
    const err = document.createElement('p');
    err.className = 'error-msg';
    err.textContent = 'Password duhet 8+ karaktere, 1 i madh, 1 i vogel, 1 numer, 1 simbol';
    err.style.color = 'red';
    err.style.fontSize = '12px';
    err.style.marginTop = '2px';
    passwordInput.after(err);
    passwordInput.style.borderColor = 'red';
    valid = false;
  }

  if (passwordInput.value !== passwordConfirmInput.value || passwordConfirmInput.value === '') {
    const err = document.createElement('p');
    err.className = 'error-msg';
    err.textContent = 'Passwordet nuk përputhen';
    err.style.color = 'red';
    err.style.fontSize = '12px';
    err.style.marginTop = '2px';
    passwordConfirmInput.after(err);
    passwordConfirmInput.style.borderColor = 'red';
    valid = false;
  }

  if (valid) {
    location.href = 'index.php';
  }
};
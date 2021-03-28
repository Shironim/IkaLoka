function setErrorFor(input,message) {
  const form = input.parentElement;
  const feedback = form.querySelector('#invalid');
  form.classList = 'mb-3 _form position-relative error';
  feedback.classList.add('d-block');
  feedback.innerText = message;
}
function setSuccessFor(input) {
  const form = input.parentElement;
  form.classList = 'mb-3 _form position-relative success';
  const feedback = form.querySelector('#invalid');
  feedback.classList.add('d-none');
}
  
function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

<script>
const form = document.getElementById('form');
const email = document.querySelector('#email');
const password = document.querySelector('#password');

form.addEventListener('submit', e =>{
  e.preventDefault();

  // trim to remove the whitespaces
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();

  if(emailValue === '') {
    setErrorFor(email,'Email tidak boleh kosong');
  }else if(!isEmail(emailValue)){
    setErrorFor(email,'Email harus sesuai');
  }else{
    setSuccessFor(email);
  }

  if(passwordValue === '') {
    setErrorFor(password,'Password tidak boleh kosong');
  }else{
    setSuccessFor(password);
  }

  const ajax = new XMLHttpRequest();

  ajax.open("POST", "page/validasi-login.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("email=$emailValue&password=$passwordValue");
});

</script>
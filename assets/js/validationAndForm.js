//toggle login forms in index.php between admin patient and doctor
var previousRole = document.getElementById('role-patient');//initially at patient form
var previousForm = document.getElementById('patient-login');

function showForm(id,currentRole){
  if(previousRole!=currentRole){

    previousRole.classList.remove('active');
    currentRole.classList.add('active');
  
    var currentForm = document.getElementById(id);
    currentForm.classList.remove('hidden');
    previousForm.classList.add('hidden');
  
    previousRole = currentRole;
    previousForm = currentForm;
  }
  
}
let pattern = /^[a-zA-Z0-9\-_]+@[a-zA-Z]+\.[a-zA-z]{2,3}/;
//validate
function validate(ele,pass,flag){
    let error = 0;
    let email = document.getElementById(ele);
    let emailValue = email.value.trim();
    let pw = document.getElementById(pass);
    let pwvalue = pw.value.trim();
    if(!flag){
  
      
      if(!pattern.test(emailValue)){
        email.focus();
        email.style.color = 'red';
        email.value = '';
        pw.value='';
        email.setAttribute('placeholder','Not a valid email format'); 
         
        error++;
        
      }
    }
    if(flag && emailValue==''){
      email.focus();
      email.style.color = 'red';
      email.value='';
      pw.value='';
      email.setAttribute('placeholder','Must enter username');       
      error++;
    }
    if(pwvalue==''){
      if(error==0)
      pw.focus();
      pw.style.color = 'red';
      pw.value = '';
      pw.setAttribute('placeholder','Must enter password');   
      
      error++;
    }
    if(error>0){
      makeDefault(email,pw);  
      return false;
    }
    else{
      return true;
    }
  }
  function makeDefault(email,pw){
    email.addEventListener('keypress',function(){
      email.style.color = 'black';
      email.setAttribute('placeholder','');
    })
    pw.addEventListener('keypress',function(){
      pw.style.color = 'black';
      pw.setAttribute('placeholder','');
    })
  }

  //validate doctor add form
  function valDoc(){
    let error = 0;
    let nameReg = /^[a-zA-Z]+\s[a-zA-Z]+$/
    let contReg = /^[9]\d{9}$/
    let name = document.getElementById('name');
    let email = document.getElementById('doc-add-email');
    let pw = document.getElementById('password');
    let conf = document.getElementById('conf-password');
    let spec = document.getElementById('specVal');
    let cont = document.getElementById('contact');
    let address = document.getElementById('address');
    let lic = document.getElementById('license');

    if(!nameReg.test(name.value.trim())){
      error ++;
      name.value = '';
      name.placeholder = 'Invalid Name';
      name.focus();
    }
    if(!pattern.test(email.value.trim())){
      error++;
      email.value = '';
      email.placeholder = 'Invalid email';
      if(error==1){
        email.focus();
      }
    }
    if(pw.value.trim()!=conf.value.trim()){
      error++;
      if(error==1){
        conf.focus();
        alert('Both passwords must match');
      }
    }
    if(spec.value==''){
      error++;
      if(error==1){
        spec.focus();
      }
    }
    if(!contReg.test(cont.value.trim())){
      error++;
      cont.value='';
      cont.placeholder = 'Invalid Phone';
      if(error==1){
        cont.focus();
      }
    }
    if(address.value.trim()==''){
      error++;
      address.placeholder = 'Must not be empty';
      if(error==1){
        address.focus();
      }
    }
    if(lic.value.trim()==''){
      error++;
      lic.placeholder = 'Must not be empty';
      if(error==1){
        lic.focus();
      }
    }
    if(error>0){
      return false;
    }
    
    else if(error==0){
      return true;
    }

  }

  //validate patient add form
  function valPat(){
    let error = 0;
    let nameReg = /^[a-zA-Z]+\s[a-zA-Z]+$/
    let contReg = /^[9]\d{9}$/
    let dobReg = /^[\d+]{4}\-[\d+]{1,2}\-[\d+]{1,2}$/
    let name = document.getElementById('patName');
    let email = document.getElementById('pat-add-email');
    let pw = document.getElementById('patPw');
    let conf = document.getElementById('patConf');
    let gender = document.getElementById('patGender');
    let cont = document.getElementById('patCont');
    let patDob = document.getElementById('patDob');

    if(!nameReg.test(name.value.trim())){
      error ++;
      name.value = '';
      name.placeholder = 'Invalid Name';
      name.focus();
    }
    if(!pattern.test(email.value.trim())){
      error++;
      email.value = '';
      email.placeholder = 'Invalid email';
      if(error==1){
        email.focus();
      }
    }
    if(pw.value.trim()!=conf.value.trim()){
      error++;
      if(error==1){
        conf.focus();
      }
    }
    if(gender.value==''){
      error++;
      if(error==1){
        gender.focus();
      }
    }
    if(!contReg.test(cont.value.trim())){
      error++;
      cont.value='';
      cont.placeholder = 'Invalid Phone';
      if(error==1){
        cont.focus();
      }
    }
    if(!dobReg.test(patDob.value)){
      error++;
      alert('Invalid Date Format');
    }
    if(dobReg.test(patDob.value)){
      let x = patDob.value.split('-');
      let dob = new Date(x[0],Number(x[1])-1,x[2]);
      let currentdate = new Date();
      if(dob.getTime()>=currentdate.getTime()){
        error++;
        alert('Invalid DOB');
      }

    }
    if(error>0){
      return false;
    }
    
    else if(error==0){
      return true;
    }

  }
let pattern = /^[a-zA-Z0-9\-_]+@[a-zA-Z]+\.[a-zA-z]{2,3}/;
let emailValue = 'maheshbabu123@gmail.com';
console.log( pattern.test(emailValue));
if(!pattern.test(emailValue)){
    console.log("Incorrect Email Format");
    
  }
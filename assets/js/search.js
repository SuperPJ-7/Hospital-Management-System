//disabling the buttons
let disableBtn = document.querySelectorAll('.disableBtn');
disableBtn.forEach(
  function(btn){
    btn.disabled = true;
    btn.classList.add('disabled')
  }
);
function disableB(){
  let disableButtons = document.querySelectorAll('.disableBtn');
  disableButtons.forEach(
  function(btn){
    btn.disabled = true;
    btn.classList.add('disabled')
  }
);
}

//search with key, destination:where to load content, source: from where to fetch content
//uses relative path, if it doesn't work, have to use absolute path
function Search(key,destination,source){
    let id = document.getElementById(key).value.trim();
    if((id<=0 || isNaN(id)) && id!=''){
      
      document.getElementById(key).value = '';
      
      document.getElementById(key).placeholder = 'Must be integer and larger than 0';
    }
    else{
  
      const xhr = new XMLHttpRequest();
      xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById(destination).innerHTML = xhr.responseText;
            disableB();
        }
      };
      console.log(destination);
      xhr.open('POST',source,true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("key="+id);
    }
  }

  //managing onchange event in select elements
  //filter appointment on the basis of status: completed cancelled pending scheduled
  function filterApt(event,source,destination){
    let status = event.target.value;
    console.log(event.target.value);
    let xhr = new XMLHttpRequest();
    xhr.open("POST",source,true);
    xhr.onload = function(){
      if(xhr.status == 200)
      document.getElementById(destination).innerHTML = xhr.responseText;
      disableB();
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("status="+status);

  }

  //search using email in admin page
  function searchEmail(key,source,destination){
    let email = document.getElementById(key).value.trim();
    let pattern = /^[a-zA-Z0-9\-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
    if(!pattern.test(email) && email!=''){
      
      document.getElementById(key).value = '';
      
      document.getElementById(key).placeholder = 'Not a valid email';
    }
    else{
  
      const xhr = new XMLHttpRequest();
      xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById(destination).innerHTML = xhr.responseText;
            disableB();
        }
      };
      console.log(destination);
      xhr.open('POST',source,true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("email="+email);
    }
  }
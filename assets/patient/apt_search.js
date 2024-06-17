//filter appointment
document.getElementById('apt-status').addEventListener('change',function(event){
  let status = event.target.value;
  console.log(status);
  let xhr = new XMLHttpRequest();
  xhr.open("POST","http://localhost/myhms/patient/patient_apt_search.php",true);
  xhr.onload = function(){
    if(xhr.status == 200)
    document.getElementById('patient-apt-table').innerHTML = xhr.responseText;
  disableB();
  }
  xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhr.send("status="+status);
})

//appointment search ajax

function patientAptSearch(){
    let apt_id = document.getElementById('apt-id').value.trim();
    // console.log(isNaN(apt_id))
    if((apt_id<=0 || isNaN(apt_id)) && apt_id!=''){
      
      document.getElementById('apt-id').value = '';
      
      document.getElementById('apt-id').placeholder = 'Must be integer and larger than 0';
    }
    else{
  
      // console.log(apt_id);
      let xhr = new XMLHttpRequest();
      xhr.open('POST','patient/patient_apt_search.php',true);
      let tableDiv = document.getElementById('patient-apt-table');
      xhr.onload = function(){
        if(xhr.status = 200){
          tableDiv.innerHTML = xhr.responseText;
          disableB();
        }
      }
      xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      xhr.send("aid="+apt_id);
    }
    
  }
  //prescription search
  
function presSearch(){
  let pres_id = document.getElementById('pres-search').value.trim();
  console.log(isNaN(pres_id))
  if((pres_id<=0 || isNaN(pres_id)) && pres_id!=''){
    
    document.getElementById('apt-id').value = '';
    
    document.getElementById('apt-id').placeholder = 'Must be integer and larger than 0';
  }
  else{

    // console.log(pres_id);
    let xhr = new XMLHttpRequest();
    xhr.open('POST','patient/prescription_search.php',true);
    let tableDiv = document.getElementById('prescription-table');
    xhr.onload = function(){
      if(xhr.status = 200){
        tableDiv.innerHTML = xhr.responseText;
        disableB();
      }
    }
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send("pres-id="+pres_id);
  }
  
}
  //disabling the buttons
let disableBtn = document.querySelectorAll('.disableBtn');
disableBtn.forEach(
  function(btn){
    btn.disabled = true;
    btn.classList.add('disabled')
  }
);
  function disableB(){
    console.log('disable called');
    let disableButtons = document.querySelectorAll('.disableBtn');
    disableButtons.forEach(
    function(btn){
      btn.disabled = true;
      btn.classList.add('disabled')
    }
  );
  }


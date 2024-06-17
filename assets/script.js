//toggle login
var previousRole = document.getElementById('role-patient');
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

//validate
function validate(ele){
  let error = 0;
  console.log(ele);
  let emailValue = document.getElementById(ele).value;
  console.log(emailValue);
  let pattern = /^[a-zA-Z0-9\-_]+@[a-zA-Z]+\.[a-zA-z]{2,3}/;
  if(!pattern.test(emailValue)){
    
    error++;
    
  }
  if(error>0){
    return false;
  }
  else{
    return true;
  }
}

//navbar dropdown
  document.getElementById('profile-icon').addEventListener('click',toggledropdown);
  function toggledropdown(){
    
    let dd = document.getElementById('dropdown');
    dd.style.display = (dd.style.display === 'block')? 'none':'block';
  }
  

  
  //offcanvas form scripts for doctor
  function openForm() {
      document.getElementById("sideFormContainer").style.width = "100%";
      document.getElementById("sideForm").style.width = "650px";
    }
    
    function closeForm() {
      document.getElementById("sideFormContainer").style.width = "0";
      document.getElementById("sideForm").style.width = "0";
    }
  
    //offcanvas for nurse
    function openForm2() {
      document.getElementById("sideFormContainer2").style.width = "100%";
      document.getElementById("sideForm2").style.width = "650px";
    }
    
    function closeForm2() {
      document.getElementById("sideFormContainer2").style.width = "0";
      document.getElementById("sideForm2").style.width = "0";
    }
  
    //offcanvas for patient
    function openFormPat() {
      document.getElementById("sideFormContainerPat").style.width = "100%";
      document.getElementById("sideFormPat").style.width = "650px";
    }
    
    function closeFormPat() {
      document.getElementById("sideFormContainerPat").style.width = "0";
      document.getElementById("sideFormPat").style.width = "0";
    }
  
  //admin-links
  var previous_link = document.getElementById('dash');
  var previousContent = document.getElementById('dashboard')
  var previousHeading = document.getElementById('heading');
  function showcontent(id,currentlink){
    if(previous_link!=currentlink){
      previous_link.classList.remove('active');
      currentlink.classList.add('active');
      // let contentDivs = document.querySelectorAll('.content');
      // contentDivs.forEach(
      //   function(div){
      //     div.classList.add('hidden');
      //   }
      // )
      let currentHeading = (id=='dashboard')? id.charAt(0).toUpperCase() + id.slice(1):id.charAt(0).toUpperCase() + id.slice(1)+'s';
      previousContent.classList.add('hidden');
      let selectedContent = document.getElementById(id);
      selectedContent.classList.remove('hidden');
      previousHeading.textContent=currentHeading;
      
      previous_link = currentlink;
      previousContent = selectedContent;
    }
  }
  

  
  //doctor search
  document.getElementById('btn-doc-search').addEventListener("click",doctorTable);
  function doctorTable(){
    
    let email = document.getElementById('doc-email').value.trim();
    const xhr = new XMLHttpRequest();
    xhr.onprogress = function(){
      document.getElementById('table-container').innerHTML = "searching please wait";
    }
    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById("table-container").innerHTML = xhr.responseText;
            
        }
    };
    xhr.open('POST','doc_search.php',true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("email="+email);
  }
  
  //nurse search
  document.getElementById('btn-nurse-search').addEventListener("click",nurseTable);
  function nurseTable(){
    
    let email = document.getElementById('nurse-email').value.trim();
    const xhr = new XMLHttpRequest();
    xhr.onprogress = function(){
      document.getElementById('nurse-table').innerHTML = "searching please wait";
    }
    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById("nurse-table").innerHTML = xhr.responseText;
        }
    };
    xhr.open('POST','nurse_search.php',true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("email="+email);
  }
  
  //patient search
  document.getElementById('btn-pat-search').addEventListener("click",patientTable);
  function patientTable(){
    
    let email = document.getElementById('patient-email').value.trim();
    const xhr = new XMLHttpRequest();
    xhr.onprogress = function(){
      document.getElementById('patient-table').innerHTML = "searching please wait";
    }
    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById("patient-table").innerHTML = xhr.responseText;
        }
    };
    xhr.open('POST','patient_search.php',true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("email="+email);
  }
  
  //appointment search
 //appointment search ajax

function aptSearch(){
  let apt_id = document.getElementById('apt-id').value.trim();  
  if((apt_id<=0 || isNaN(apt_id)) && apt_id!=''){
    
    document.getElementById('apt-id').value = '';
    
    document.getElementById('apt-id').placeholder = 'Must be integer and larger than 0';
  }
  else{

    
    let xhr = new XMLHttpRequest();
    xhr.open('POST','admin/apt_search.php',true);
    let tableDiv = document.getElementById('appointment-table');
    xhr.onload = function(){
      if(xhr.status = 200){
        tableDiv.innerHTML = xhr.responseText;
        
      }
    }
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send("aid="+apt_id);
  }
  
}

//filter appointment
document.getElementById('apt-status').addEventListener('change',function(event){
  let status = event.target.value;
  console.log(status)
  let xhr = new XMLHttpRequest();
  xhr.open("POST","admin/apt_search.php",true);
  xhr.onload = function(){
    if(xhr.status == 200)
    document.getElementById('appointment-table').innerHTML = xhr.responseText;
  
  }
  xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhr.send("status="+status);
})


 //prescription search
 //prescription search ajax

 function pres_search(){
  let pres_id = document.getElementById('pres_id').value.trim();  
  if((pres_id<=0 || isNaN(pres_id)) && pres_id!=''){
    
    document.getElementById('pres_id').value = '';
    
    document.getElementById('pres_id').placeholder = 'Must be integer and larger than 0';
  }
  else{
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST','admin/prescription_search.php',true);
    let tableDiv = document.getElementById('prescription-table');
    xhr.onload = function(){
      if(xhr.status = 200){
        tableDiv.innerHTML = xhr.responseText;
        
      }
    }
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send("pid="+pres_id);
  }
  
}

function logout(){
  let logoutFlag = confirm('Are you sure you want to logout?');
  if(logoutFlag){
    window.location.href='logout.php';
  }
  
}

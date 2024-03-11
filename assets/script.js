//toggle login
var previousRole = document.getElementById('role-patient');
var previousForm = document.getElementById('patient-login');

function showForm(id,currentRole){
  previousRole.classList.remove('active');
  currentRole.classList.add('active');

  var currentForm = document.getElementById(id);
  currentForm.classList.remove('hidden');
  previousForm.classList.add('hidden');

  previousRole = currentRole;
  previousForm = currentForm;
  
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
  
  //links
  var previous_link = document.getElementById('dash');
  var previousContent = document.getElementById('dashboard')
  
  function showcontent(id,currentlink){
    currentlink.classList.add('active');
    previous_link.classList.remove('active');
    // let contentDivs = document.querySelectorAll('.content');
    // contentDivs.forEach(
    //   function(div){
    //     div.classList.add('hidden');
    //   }
    // )
  
    previousContent.classList.add('hidden');
    let selectedContent = document.getElementById(id);
    selectedContent.classList.remove('hidden');
  
    
    previous_link = currentlink;
    previousContent = selectedContent;
    
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
  

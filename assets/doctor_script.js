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

//patient-links
var prev_link = document.getElementById('doc-prof');
var prevContent = document.getElementById('doc-profcon')

function showcontentDoctor(id,currentlink){
  if(prev_link!==currentlink){
    prev_link.classList.remove('active');
    currentlink.classList.add('active');
    // let contentDivs = document.querySelectorAll('.content');
    // contentDivs.forEach(
    //   function(div){
    //     div.classList.add('hidden');
    //   }
    // )
    
    prevContent.classList.add('hidden');
    let selectedContent = document.getElementById(id);
    selectedContent.classList.remove('hidden');
  
    
    prev_link = currentlink;
    prevContent = selectedContent;
  }
  
}


//appointment search ajax

function aptSearch(){
  let apt_id = document.getElementById('apt-id').value.trim();
  // console.log(isNaN(apt_id))
  if(apt_id<=0 || isNaN(apt_id) || apt_id==''){
    
    document.getElementById('apt-id').value = '';
    
    document.getElementById('apt-id').placeholder = 'Must be integer and larger than 0';
  }
  else{

    // console.log(apt_id);
    let xhr = new XMLHttpRequest();
    xhr.open('POST','doc_apt_search.php',true);
    let tableDiv = document.getElementById('doc-apt-table');
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

//prescription search ajax

function prescriptionSearch(){
  let patient_id = document.getElementById('pres-search').value.trim();
  console.log(isNaN(patient_id))
  if(patient_id<=0 || isNaN(patient_id) || patient_id==''){
    
    document.getElementById('pres-search').value = '';
    
    document.getElementById('pres-search').placeholder = 'Must be integer and larger than 0';
  }
  else{

    // console.log(patient_id);
    let xhr = new XMLHttpRequest();
    xhr.open('POST','doc_pres_search.php',true);
    let tableDiv = document.getElementById('prescription-table');
    xhr.onload = function(){
      if(xhr.status = 200){
        tableDiv.innerHTML = xhr.responseText;
        
      }
    }
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send("pid="+patient_id);
  }
  
}
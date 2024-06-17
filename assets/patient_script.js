//disabling the buttons
// let disableBtn = document.querySelectorAll('.disableBtn');
// disableBtn.forEach(
//   function(btn){
//     btn.disabled = true;
//     btn.classList.add('disabled')
//   }
// );

//patient-links
var prev_link = document.getElementById('prof');
var prevContent = document.getElementById('profcon')

function showcontentPatient(id,currentlink){
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

//adding event to select element in appointment booking form
document.getElementById('spec-select').addEventListener('change',function(event){
  let spec = event.target.value;
  console.log(spec);
   const xhr = new XMLHttpRequest();
   xhr.onload = function(){
    if(xhr.status==200){

      document.getElementById('doc-select').innerHTML = xhr.responseText;
    }
   }
   xhr.open('POST','http://localhost/myhms/doc_load.php',true);
   xhr.setRequestHeader('Content-type',"application/x-www-form-urlencoded");
   xhr.send("spec="+spec);
})


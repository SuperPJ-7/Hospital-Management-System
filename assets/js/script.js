
//navbar dropdown
document.getElementById('profile-icon').addEventListener('click', toggledropdown);
function toggledropdown() {

  let dd = document.getElementById('dropdown');
  dd.style.display = (dd.style.display === 'block') ? 'none' : 'block';
}


//links change
let prevLink = '';
let prevContent = '';
function setLinkValues(link, content) {
  prevLink = document.getElementById(link);
  prevContent = document.getElementById(content);

}
function showContent(id, currentlink) {
  if (prevLink !== currentlink) {
    prevLink.classList.remove('active');
    currentlink.classList.add('active');


    prevContent.classList.add('hidden');
    let selectedContent = document.getElementById(id);
    selectedContent.classList.remove('hidden');


    prevLink = currentlink;
    prevContent = selectedContent;
  }

}




//offcanvas form scripts for doctor
function openForm(container, form) {
  document.getElementById(container).style.width = "100%";
  document.getElementById(form).style.width = "650px";
}

function closeForm(container,form) {
  document.getElementById(container).style.width = "0";
  document.getElementById(form).style.width = "0";
}



// //offcanvas for patient
// function openFormPat() {
//   document.getElementById("sideFormContainerPat").style.width = "100%";
//   document.getElementById("sideFormPat").style.width = "650px";
// }

// function closeFormPat() {
//   document.getElementById("sideFormContainerPat").style.width = "0";
//   document.getElementById("sideFormPat").style.width = "0";
// }

// //admin-links
// var previous_link = document.getElementById('dash');
// var previousContent = document.getElementById('dashboard')
// var previousHeading = document.getElementById('heading');
// function showcontent(id,currentlink){
//   if(previous_link!=currentlink){
//     previous_link.classList.remove('active');
//     currentlink.classList.add('active');
//     // let contentDivs = document.querySelectorAll('.content');
//     // contentDivs.forEach(
//     //   function(div){
//     //     div.classList.add('hidden');
//     //   }
//     // )
//     let currentHeading = (id=='dashboard')? id.charAt(0).toUpperCase() + id.slice(1):id.charAt(0).toUpperCase() + id.slice(1)+'s';
//     previousContent.classList.add('hidden');
//     let selectedContent = document.getElementById(id);
//     selectedContent.classList.remove('hidden');
//     previousHeading.textContent=currentHeading;

//     previous_link = currentlink;
//     previousContent = selectedContent;
//   }
// }









// //filter appointment
// document.getElementById('apt-status').addEventListener('change',function(event){
//   let status = event.target.value;
//   console.log(status)
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST","admin/apt_search.php",true);
//   xhr.onload = function(){
//     if(xhr.status == 200)
//     document.getElementById('appointment-table').innerHTML = xhr.responseText;

//   }
//   xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//   xhr.send("status="+status);
// })




function logout() {
  let logoutFlag = confirm('Are you sure you want to logout?');
  if (logoutFlag) {
    window.location.href = '../logout.php';
  }

}

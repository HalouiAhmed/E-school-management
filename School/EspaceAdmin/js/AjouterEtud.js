function AjouterEtudiant() {
  var nbrContact=document.getElementById("nbrEtudiant").value;
  var test=document.getElementById("myCheck");
  var cont =document.getElementById("form").innerHTML;
  console.log(nbrContact);
  console.log(nbrContact);
  console.log(cont);
  if(test.checked==true){

  var i;
for (i = 0; i <(nbrContact-1); i++) {
 document.getElementById("AjoutDeform").innerHTML+='<hr class="sidebar-divider">'+'<h3 class=" font-weight-bold text-info text-center shadow  titre">ETUDIANT NUMERO : '+(i+2)+' </h3>'+cont;

}
}
else{
  document.getElementById("AjoutDeform").innerHTML="";
}

}


function AjouterProf() {
  var nbrContact=document.getElementById("nbrEtudiant").value;
  var test=document.getElementById("myCheck");
  var cont =document.getElementById("form").innerHTML;
  console.log(nbrContact);
  console.log(nbrContact);
  console.log(cont);
  if(test.checked==true){

  var i;
for (i = 0; i <(nbrContact-1); i++) {
 document.getElementById("AjoutDeform").innerHTML+='<hr class="sidebar-divider">'+'<h3 class=" font-weight-bold text-info text-center shadow  titre">PROF NUMERO : '+(i+2)+' </h3>'+cont;

}
}
else{
  document.getElementById("AjoutDeform").innerHTML="";
}

}


function AjouterMat() {
  var nbrContact=document.getElementById("nbrEtudiant").value;
  var test=document.getElementById("myCheck");
  var cont =document.getElementById("form").innerHTML;
  console.log(nbrContact);
  console.log(nbrContact);
  console.log(cont);
  if(test.checked==true){

  var i;
for (i = 0; i <(nbrContact-1); i++) {
 document.getElementById("AjoutDeform").innerHTML+='<hr class="sidebar-divider">'+'<h3 class=" font-weight-bold text-info text-center shadow  titre">MATIERE NUMERO : '+(i+2)+' </h3>'+cont;

}
}
else{
  document.getElementById("AjoutDeform").innerHTML="";
}

}


function AjouterCl() {
  var nbrContact=document.getElementById("nbrEtudiant").value;
  var test=document.getElementById("myCheck");
  var cont =document.getElementById("form").innerHTML;
  console.log(nbrContact);
  console.log(nbrContact);
  console.log(cont);
  if(test.checked==true){

  var i;
for (i = 0; i <(nbrContact-1); i++) {
 document.getElementById("AjoutDeform").innerHTML+='<hr class="sidebar-divider">'+'<h3 class=" font-weight-bold text-info text-center shadow  titre">CLASSE NUMERO : '+(i+2)+' </h3>'+cont;

}
}
else{
  document.getElementById("AjoutDeform").innerHTML="";
}

}


function AjouterCours() {
  var nbrContact=document.getElementById("nbrEtudiant").value;
  var test=document.getElementById("myCheck");
  var cont =document.getElementById("form").innerHTML;
  console.log(nbrContact);
  console.log(nbrContact);
  console.log(cont);
  if(test.checked==true){

  var i;
for (i = 0; i <(nbrContact-1); i++) {
 document.getElementById("AjoutDeform").innerHTML+='<hr class="sidebar-divider">'+'<h3 class=" font-weight-bold text-info text-center shadow  titre">COURS NUMERO : '+(i+2)+' </h3>'+cont;

}
}
else{
  document.getElementById("AjoutDeform").innerHTML="";
}

}

function AjouterAnnee() {
  var nbrContact=document.getElementById("nbrEtudiant").value;
  var test=document.getElementById("myCheck");
  var cont =document.getElementById("form").innerHTML;
  console.log(nbrContact);
  console.log(nbrContact);
  console.log(cont);
  if(test.checked==true){

  var i;
for (i = 0; i <(nbrContact-1); i++) {
 document.getElementById("AjoutDeform").innerHTML+='<hr class="sidebar-divider">'+'<h3 class=" font-weight-bold text-info text-center shadow  titre">ANNEE NUMERO : '+(i+2)+' </h3>'+cont;

}
}
else{
  document.getElementById("AjoutDeform").innerHTML="";
}

}


var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};






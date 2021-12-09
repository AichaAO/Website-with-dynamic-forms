function mOver(obj) {
  obj.style.color='#ecf2f9'
}

function mOut(obj) {
  obj.style.color='#001a33'
}





function affi1() {
	var acceuil = document.getElementById('page_acceuil');
	var r_person = document.getElementById('rens_person');
	var contact = document.getElementById('detail_contact');
	var enseign = document.getElementById('enseignement');
	var qualif = document.getElementById('qualification');
	var exper = document.getElementById('experience');
	acceuil.style.visibility='visible';
	r_person.style.visibility='hidden';
	contact.style.visibility='hidden';
	enseign.style.visibility='hidden';
	qualif.style.visibility='hidden';
	exper.style.visibility='hidden';
}

function affi2() {
	var acceuil = document.getElementById('page_acceuil');
	var r_person = document.getElementById('rens_person');
	var contact = document.getElementById('detail_contact');
	var enseign = document.getElementById('enseignement');
	var qualif = document.getElementById('qualification');
	var exper = document.getElementById('experience');
	acceuil.style.visibility='hidden';
	r_person.style.visibility='visible';
	contact.style.visibility='hidden';
	enseign.style.visibility='hidden';
	qualif.style.visibility='hidden';
	exper.style.visibility='hidden';
}

function affi3() {
	var acceuil = document.getElementById('page_acceuil');
	var r_person = document.getElementById('rens_person');
	var contact = document.getElementById('detail_contact');
	var enseign = document.getElementById('enseignement');
	var qualif = document.getElementById('qualification');
	var exper = document.getElementById('experience');
	acceuil.style.visibility='hidden';
	r_person.style.visibility='hidden';
	contact.style.visibility='visible';
	enseign.style.visibility='hidden';
	qualif.style.visibility='hidden';
	exper.style.visibility='hidden';
}

function affi4() {
	var acceuil = document.getElementById('page_acceuil');
	var r_person = document.getElementById('rens_person');
	var contact = document.getElementById('detail_contact');
	var enseign = document.getElementById('enseignement');
	var qualif = document.getElementById('qualification');
	var exper = document.getElementById('experience');
	acceuil.style.visibility='hidden';
	r_person.style.visibility='hidden';
	contact.style.visibility='hidden';
	enseign.style.visibility='visible';
	qualif.style.visibility='hidden';
	exper.style.visibility='hidden';
}

function affi5() {
	var acceuil = document.getElementById('page_acceuil');
	var r_person = document.getElementById('rens_person');
	var contact = document.getElementById('detail_contact');
	var enseign = document.getElementById('enseignement');
	var qualif = document.getElementById('qualification');
	var exper = document.getElementById('experience');
	acceuil.style.visibility='hidden';
	r_person.style.visibility='hidden';
	contact.style.visibility='hidden';
	enseign.style.visibility='hidden';
	qualif.style.visibility='visible';
	exper.style.visibility='hidden';
}

function affi6() {
	var acceuil = document.getElementById('page_acceuil');
	var r_person = document.getElementById('rens_person');
	var contact = document.getElementById('detail_contact');
	var enseign = document.getElementById('enseignement');
	var qualif = document.getElementById('qualification');
	var exper = document.getElementById('experience');
	acceuil.style.visibility='hidden';
	r_person.style.visibility='hidden';
	contact.style.visibility='hidden';
	enseign.style.visibility='hidden';
	qualif.style.visibility='hidden';
	exper.style.visibility='visible';
}


function maroc_dip() {
	var label = document.getElementById('tel11');
	var load = document.getElementById('dip1');
	label.style.visibility='hidden';
	load.style.visibility='hidden';
}

function etrang_dip() {
	var label = document.getElementById('tel11');
	var load = document.getElementById('dip1');
	label.style.visibility='visible';
	load.style.visibility='visible';
	
}

function maroc_dip2() {
	var label = document.getElementById('tel22');
	var load = document.getElementById('dip2');
	label.style.visibility='hidden';
	load.style.visibility='hidden';
}

function etrang_dip2() {
	var label = document.getElementById('tel22');
	var load = document.getElementById('dip2');
	label.style.visibility='visible';
	load.style.visibility='visible';
	
}

function sec_prive() {
	var label = document.getElementById('allow_exam');
	var load = document.getElementById('allow_file');
	label.style.visibility='hidden';
	load.style.visibility='hidden';
}

function sec_public() {
	var label = document.getElementById('allow_exam');
	var load = document.getElementById('allow_file');
	label.style.visibility='visible';
	load.style.visibility='visible';
	
}



var identifier;
var new_id= 20;

function f1(event) {
identifier= event.getAttributeNode("id").value;
var text= event.innerHTML;
var inputText = document.getElementById("txt");
inputText.value = text;
}

function addLI() {
var inputText = document.getElementById("txt");
var textNode = document.createTextNode(inputText.value);
var option_liste = document.getElementById("optionListe");

var para = document.createElement("P");
var inputCheck = document.createElement("INPUT");
inputCheck.type ="checkbox";
var labelCheck = document.createElement("LABEL");
labelCheck.id=new_id;
labelCheck.setAttribute("onclick", "f1(this)")
labelCheck.appendChild(textNode);
para.appendChild(inputCheck);
para.appendChild(labelCheck);
option_liste.appendChild(para);
new_id++;
}

function editLI() {
var inputText = document.getElementById("txt");
var element = document.getElementById(identifier);
element.innerHTML = inputText.value;

}

function deleteLI() {
var child = document.getElementById(identifier);
var parent1 =child.parentNode;
child.parentNode.removeChild(child);
parent1.parentNode.removeChild(parent1);

}
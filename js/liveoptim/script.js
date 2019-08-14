
function fenetreLiveoptimOuvrir() {
	var elementFenetre = document.getElementById('fenetreLiveoptim');
	elementFenetre.style.display = 'block';
}

function fenetreLiveoptimFermer() {
	var elementFenetre = document.getElementById('fenetreLiveoptim');
	elementFenetre.style.display = 'none';
}
function fenetre1LiveoptimOuvrir() {
	var elementFenetre1 = document.getElementById('fenetre1Liveoptim');
	elementFenetre1.style.display = 'block';
}

function fenetre1LiveoptimFermer() {
	var elementFenetre1 = document.getElementById('fenetre1Liveoptim');
	elementFenetre1.style.display = 'none';
}
function fenetre2LiveoptimOuvrir() {
	var elementFenetre2 = document.getElementById('fenetre2Liveoptim');
	elementFenetre2.style.display = 'block';
}

function fenetre2LiveoptimFermer() {
	var elementFenetre2 = document.getElementById('fenetre2Liveoptim');
	elementFenetre2.style.display = 'none';
}
function fenetre3LiveoptimOuvrir() {
	var elementFenetre3 = document.getElementById('fenetre3Liveoptim');
	elementFenetre3.style.display = 'block';
}

function fenetre3LiveoptimFermer() {
	var elementFenetre3 = document.getElementById('fenetre3Liveoptim');
	elementFenetre3.style.display = 'none';
}
function fenetre4LiveoptimOuvrir() {
	var elementFenetre4 = document.getElementById('fenetre4Liveoptim');
	elementFenetre4.style.display = 'block';
}

function fenetre4LiveoptimFermer() {
	var elementFenetre4 = document.getElementById('fenetre4Liveoptim');
	elementFenetre4.style.display = 'none';
}
function fenetre5LiveoptimOuvrir() {
	var elementFenetre5 = document.getElementById('fenetre5Liveoptim');
	elementFenetre5.style.display = 'block';
}

function fenetre5LiveoptimFermer() {
	var elementFenetre5 = document.getElementById('fenetre5Liveoptim');
	elementFenetre5.style.display = 'none';
}
function fenetre6LiveoptimOuvrir() {
	var elementFenetre6 = document.getElementById('fenetre6Liveoptim');
	elementFenetre6.style.display = 'block';
}

function fenetre6LiveoptimFermer() {
	var elementFenetre6 = document.getElementById('fenetre6Liveoptim');
	elementFenetre6.style.display = 'none';
}

function verifRequetteMotCle(msg){
	if(document.getElementsByName('requete')[0].value==''){
		alert(msg);
		return false;
	}
	return true;
}

function fenetreInfoPreniumOuvrir() {
	var elementInfoPrenium = document.getElementById('fenetreInfoPrenuim');
	elementInfoPrenium.style.display = 'block';
}

function fenetreInfoPreniumFermer() {
	var elementInfoPrenium = document.getElementById('fenetreInfoPrenuim');
	elementInfoPrenium.style.display = 'none';
}


jQuery.noConflict();

function displayInfoPrenium(){
	var elementInfoPrenium = jQuery('#infoPrenium');
	
	if (elementInfoPrenium.css('display') == 'none'){
		elementInfoPrenium.fadeIn(1000);
	}else{
		elementInfoPrenium.fadeOut(1000);		
	}
	
}	

function displayRestriction(msg){
	alert(msg);
	return false;
}


function GereChkbox(conteneur, a_faire) {
	var blnEtat=null;
	var Chckbox = document.getElementById(conteneur).firstChild;
	while (Chckbox!=null) {
		if (Chckbox.nodeName=="INPUT")
			if (Chckbox.getAttribute("type")=="checkbox") {
				blnEtat = (a_faire=='0') ? false : (a_faire=='1') ? true : (document.getElementById(Chckbox.getAttribute("id")).checked) ? false : true;
				document.getElementById(Chckbox.getAttribute("id")).checked=blnEtat;
			}
		Chckbox = Chckbox.nextSibling;
	}
}

function verifFile(msg1,msg2,msg3,file,val){

	str=file+'';
	val=Number(val)+0;
	if(str==''){
		alert(msg1);
		return false;
	}
	if(val==7){
		ext="sql";
		msg="This is not a SQL file"
	}else if(val==6){
		ext="zip";
		msg=msg3;
	}
	else{
		ext='csv';
		msg=msg2;
	}
	extension=str.substring(str.length-3,str.length);

	if(extension==ext){
		booltest=false;
	}
	else{
		booltest=true;
	}
	
	if (booltest){
		alert(msg);
		resetFileInput();
		return false;
	}
	return true;
}

function resetFileInput()
{
	var valeurs = new Array();
	var i;
	for (i=0;i<document.forms['import_import'].length;i++) {
		if (document.forms['import_import'].elements[i].getAttribute('type') != 'file')
			valeurs[i] = document.forms['import_import'].elements[i].value;
	}
	document.forms['import_import'].reset();
	for (i=0;i<valeurs.length;i++) {
		if (document.forms['import_import'].elements[i].getAttribute('type') != 'file')
			document.forms['import_import'].elements[i].value = valeurs[i];
	}
}
/**
 * ajaxOuvrirFenetreNouveauRapport
 */
function ajaxOuvrirFenetreNouveauRapport() {
	// Creation de l'objet XMLHttpRequest
	

		document.getElementById( "rank_attente" ).style.display = '';
	get_Xhr();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// Que fera AJAX si tout se passe bien, il va inserer dans le composant HTML d'id idElement
			// le resultat de la page appellée
			document.getElementById( "rank_resultat" ).style.display = '';
			document.getElementById( "rank_attente" ).style.display = 'none';
			var id_projet=document.getElementById( "lien_so" );
			id_projet.setAttribute("href",id_projet.getAttribute("href")+xhr.responseText);
			
			
			
		}
	}
	
	// Nous allons interroger la page php souhaité pour recuperer la reponse
	xhr.open("POST", "/app/code/local/Mkt/LiveOptim/help/5_2/config/ranking/rank_google_bing.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	// Nous envoyons avec la requete ci dessus les parametres
	xhr.send( "" );
}


var xhr = null;
/**
 * Fonction de cr?ation d'objet XMLHttRequest
 */
function get_Xhr() {
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else if (window.ActiveXOject) {
		try {
			xhr = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (el) {
				xhr = null;
			}
		}
	} else {
		alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest\nVeuillez le mettre à jour.");
	}
	return xhr;
}


$(document).ready(start);

var data = {}, comentarios = null;

function getDataFromHTMLForm(){
	data.nombre = $("#nombre").val();
	data.email = $("#email").val();
	data.comentario = $("#comentario").val();
};

function displayMessage(json){
	if(!json.error_status){
		$("#d-success").css("display","block");
		$("#d-success p.message").text(json.message);
	}else{
		$("#d-error").css("display","block");
		$("#d-error p.error_description").text(json.message);
	}
};

function clearInformationFromHTMLForm(){
	$("#nombre").val("");
	$("#email").val("");
	$("#comentario").val("");
	$("#nombre").focus();
};

function sendDataToServer(){
	$.ajax({
		type: "POST",
		url: 'resources/php/index.php',
		data: data,
		success: function(json_response,textStatus,jqXHR){
			var json = JSON.parse(json_response);
			displayMessage(json);
			clearInformationFromHTMLForm();
		},
		error: function(jqXHR, textStatus, errorThrown){

		}
	});
};

function showTable(){$("#table-comments").css("display","block");}

function uploadInformation(){
	// remove all child nodes 
	$('table tbody').empty();
	for(var comentario in comentarios){
		//console.log('Data::nombre->'+(comentarios[comentario]).nombre+'|email->'+(comentarios[comentario]).email+'|comentario->'+(comentarios[comentario]).comentario);
		/*
		$('table tbody').add(
			"<tr>"+
			"<td>"+(comentarios[comentario]).nombre+"</td>"+
			"<td>"+(comentarios[comentario]).email+"</td>"+
			"<td>"+(comentarios[comentario]).comentario+"</td>"+
			"</tr>"
		);
		*/
		/*
		console.log(
			"<tr>"+
			"<td>"+(comentarios[comentario]).nombre+"</td>"+
			"<td>"+(comentarios[comentario]).email+"</td>"+
			"<td>"+(comentarios[comentario]).comentario+"</td>"+
			"</tr>"
		);
*/
		$("<tr><td>c1</td><td>c2</td><td>c3</td></tr>").appendTo($("#comments-table tbody"));
	}

};

function logicForDisplayComments(){
	$.ajax({
		type: 'GET',
		url: 'resources/php/information.php',
		data: {'name':'comentarios', 'id':null},
		success: function(json_response, textStatus, jqXHR){
			comentarios = JSON.parse(json_response);
			if(comentarios.length>=1){
				showTable();
				uploadInformation();
			}
		},
		error: function(jqXHR, textStatus, errorThrown){

		}
	});
};

function start(){
	logicForDisplayComments();
	$("#contact-form").submit(function(event){
		getDataFromHTMLForm();
		sendDataToServer();
		event.preventDefault();
	});
};
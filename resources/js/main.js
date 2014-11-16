$(document).ready(start);

var data = {};

function getDataFromHTMLForm(){
	data.nombre = $("#nombre").val();
	data.email = $("#email").val();
	data.comentario = $("#comentario").val();
};

function sendDataToServer(){
	$.ajax({
		type: "POST",
		url: 'resources/php/index.php',
		data: data,
		success: function(json_response,textStatus,jqXHR){
			var json = JSON.parse(json_response);
		},
		error: function(jqXHR, textStatus, errorThrown){

		}
	});
};

function start(){
	$("#contact-form").submit(function(event){
		getDataFromHTMLForm();
		sendDataToServer();
		event.preventDefault();
	});
};
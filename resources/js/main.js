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
			logicForDisplayComments();
		},
		error: function(jqXHR, textStatus, errorThrown){

		}
	});
};

function showTable(){$("#comments-container").css("display","block");}

function uploadInformation(){
	// remove all child nodes 
	$('#comments-table tbody').empty();
	for(var comentario in comentarios){
		$(
			"<tr>"+
			"<td><span class='glyphicon glyphicon-edit' aria-hidden='true'></span> <span class='id'>"+(comentarios[comentario]).id+"</span></td>"+
			"<td>"+(comentarios[comentario]).nombre+"</td>"+
			"<td>"+(comentarios[comentario]).email+"</td>"+
			"<td>"+(comentarios[comentario]).comentario+"</td>"+
			"</tr>"
		).appendTo($("#comments-table tbody"));
	}
	//add event to tr elements 
	$("table").on('click','tr td span.id', function(e){
		console.log(e.target.textContent);
		var id = parseInt(e.target.textContent);
		if(id>=1){
			$("#u-id").val(id);
			$("#u-d-error").css("display","none");
			$("#u-d-success").css("display","none");
			$("#m-update").modal('show');
		}else{console.log('NEVER GIVE UP!');}
	});
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

	$("#update-form").submit(function(event){
		var	id = $("#u-id").val(),
			name = $("#u-nombre").val(),
			email = $("#u-email").val(),
			comentario = $("#u-comentario").val();

		$.ajax({
			type: "POST",
			url: 'resources/php/update.php',
			data: {'id': id, 'name': name, 'email': email, 'comment': comentario},
			success: function(json_response,textStatus,jqXHR){
				var json = JSON.parse(json_response);
				if(!json.error_status){
					$("#u-d-success").css("display","block");
					$("#u-d-success p.message").text(json.message);

					$("#u-id").val("");
					$("#u-nombre").val("");
					$("#u-email").val("");
					$("#u-comentario").val("");

				}else{
					$("#u-d-error").css("display","block");
					$("#u-d-error p.error_description").text(json.message);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){

			}
		});

		event.preventDefault();
		//$("#m-update").modal('hide');
	});

};
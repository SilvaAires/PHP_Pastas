const HOME = '/DSWEBII-PHP-ROTAS/';

$(document).ready(function () {
    getMarca();
    getModelo();
    $("#btnBuscarTodos").click();
});

$("#btnBuscarTodos").click(function () {
    $.ajax({
		url: HOME + 'controller/selectTodos',
        method: 'post',
        success: function (response) {
            $("#pasteHere").html(response);
        }
    });
});

$("#btnBuscarMarca").click(function () {
    if ($("#selectMarca").val() != null) {
        $.ajax({
			url: HOME + 'controller/selectPorMarca',
            method: 'post',
            data: {
                marca: $("#selectMarca").val()
            },
            success: function (response) {
                $("#pasteHere").html(response);
            }
        });
    } else {
        toast('Selecione uma marca para buscar!')
    }
});

$("#btnBuscarModelo").click(function () {
    if ($("#selectModelo").val() != null) {
        $.ajax({
			url: HOME + 'controller/selectPorModelo',
            method: 'post',
            data: {
                modelo: $("#selectModelo").val()
            },
            success: function (response) {
                $("#pasteHere").html(response);
            }
        });
    } else {
        toast('Selecione um modelo para buscar!')
    }
});

function getMarca() {
    $.ajax({
		url: HOME + 'controller/selectMarca',
        method: 'post',
        success: function (response) {
            $("#selectMarca").html(response);
            $('select').material_select();
        }
    });
}

function getModelo() {
    $.ajax({
		url: HOME + 'controller/selectModelo',
        method: 'post',
        success: function (response) {
            $("#selectModelo").html(response);
            $('select').material_select();
        }
    });
}

function editar(id) {
	window.location.href = HOME + 'editar/' + id;
}

function excluir(id) {
	window.location.href =  HOME + 'excluir/' + id;
}

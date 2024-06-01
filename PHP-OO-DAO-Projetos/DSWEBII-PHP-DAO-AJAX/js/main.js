$(document).ready(function () {
    getMarca();
    getModelo();
    $("#btnBuscarTodos").click();
});

$("#btnBuscarTodos").click(function () {
    $.ajax({
        url: 'Controller/CarroController.php?function=selectTodos',
        method: 'post',
        success: function (response) {
            $("#pasteHere").html(response);
        }
    });
});

$("#btnBuscarMarca").click(function () {
    if ($("#selectMarca").val() != null) {
        $.ajax({
            url: 'Controller/CarroController.php?function=selectPorMarca',
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
            url: 'Controller/CarroController.php?function=selectPorModelo',
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
       url: 'Controller/CarroController.php?function=selectMarca',
        method: 'post',
        success: function (response) {
            $("#selectMarca").html(response);
            $('select').material_select();
        }
    });
}

function getModelo() {
    $.ajax({
        url: 'Controller/CarroController.php?function=selectModelo',
        method: 'post',
        success: function (response) {
            $("#selectModelo").html(response);
            $('select').material_select();
        }
    });
}

function editar(id) {
    window.location.href = 'editarCarro.php?id=' + id;
}

function excluir(id) {
    window.location.href = 'excluir.php?id=' + id;
}

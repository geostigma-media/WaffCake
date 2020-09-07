$(document).ready(function () {
  $(".example").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior"
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  $(".codReference").select2({
    allowClear: true,
    placeholder: "Buscar código de cliente..."
  });
  $(".codReferenceCliente").select2({
    allowClear: true,
    placeholder: "  Buscar código de cliente..."
  });
  $("#mensajeCodigo").hover(
    function () {
      $(this).append(
        $(`<div id="mensajeCodigo">
      <span>Este es Tu código del programa, ¡tu identificación! y debe ser
          presentado siempre que desees hacer un descuento efectivo. Ya seas por
          compras acumuladas en tarjeta cliente fiel o porque un amigo que referiste hizo
          una compra.
      </span>
    </div>`)
      );
    },
    function () {
      $(this)
        .find("#mensajeCodigo")
        .last()
        .remove();
    }
  );
  $(document).ready(function () {
    let alerta = $(".close").length;
    if (alerta == 1) {
      console.log("alerta1", alerta);
    } else {
      setTimeout(function () {
        $(".alert-success").fadeOut(1500);
      }, 3000);
      console.log("alerta2", alerta);
    }
  });
});

function countReferences() {
  let data = $("#searchCode").serialize();
  let url = route("referideDiscount");
  let code = $("#codeReferide").val();
  $("#userReferide").val(code);

  if ($("#searchCode").submit()) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      success: function (data) {
        console.log(data);
        if (code.length > 0) {
          if (data.length > 0) {
            let count = data.length * 5;
            $("#totalReferides").append(
              `<div class='alert alert-success alert-dismissable'>
                <span>El cliente tiene ${data.length} referidos, para un total de ${count}% de descuento</span>
              </div>`
            );
            $("#btnsearchCode").hide();
            $("#formPagar").show();
            setTimeout(function () {
              $("#totalReferides").fadeOut(1500);
            }, 3000);
          } else {
            $("#totalReferides").append(
              `<div class='alert alert-danger alert-dismissable'>
                <span>Código sin puntos por redenir</span>
              </div>`
            );
            setTimeout(function () {
              $("#totalReferides").fadeOut(1500);
            }, 3000);
          }
        } else {
          `<div class='alert alert-danger alert-dismissable'>
            <span>el campo es requerido</span>
          </div>`;
        }
      }
    });
  }
}

function renovationCard() {
  var data = $("#searchCode").serialize();
  var url = route("referideDiscount");
  if ($("#searchCode").submit()) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      beforeSend: function () {
        $("#searchCode")[0].reset();
      },
      success: function (data) {
        console.log(data);
        if (data.length > 0) {
          let count = data.length * 5;
          $("#totalReferides").append(
            `<div class='alert alert-success alert-dismissable'>
              <span>El cliente tiene ${data.length} referidos, para un total de ${count}% de descuento</span>
            </div>`
          );
          setTimeout(function () {
            $("#totalReferides").fadeOut(1500);
          }, 3000);
        }
      }
    });
  }
}

function searchCode() {
  var data = $("#searchCode").serialize();
  var url = route("referideDiscount");
  if ($("#searchCode").smkValidate()) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      success: function (data) {
        console.log(data);

        if ($.isEmptyObject(data.error)) {
          let alerta = document.getElementById("totalReferides");
          alerta.innerHTML =
            "<div id='decuento' class='alert alert-success'>Felicades, su tarjeta de cliente fiel se actualizo</div>";
          setTimeout(function () {
            $("#totalReferides").fadeOut(1500);
          }, 3000);
        }
      }
    });
  }
}

function specialCustomer() {
  var codReference = $("#codReferenceCliente").val();
  $("#decuento").hide();
  if (codReference != 0) {
    $.getJSON(route("loadBuys", { id: codReference }), function (data) {
      if (data.length == 0) {
        $.getJSON(route("users.find_user_by_client_card", { id: codReference }), function (user) {
          if (user.userReferide) {
            const msg = "Primera compra por referido, aplicar 2% de descuento";
            alerta.innerHTML = "<div id='decuento' class='alert alert-info'>" + msg + "</div>";
          }
        });
      } else if (data.length == 4) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 5 compras, es acreedor al 5% de descuento</div>";
        setTimeout(function () {
          $("#decuento").fadeOut(3000);
        }, 3000);
      } else if (data.length == 9) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 10 compras, eres acreedor al 10% de descuento</div>";
        setTimeout(function () {
          $("#decuento").fadeOut(3000);
        }, 3000);
      } else if (data.length == 11) {
        let idUser = $("#regularClienteId").val();
        $("#userIdTarjet").val(idUser);
        let alerta_doce = document.getElementById("alerta");
        alerta_doce.innerHTML = `<div id='decuento' class='alert alert-success'>Felicades, lleva 12 compras, eres acreedor al 50% de descuento, y se le actualizara la tarjeta del cliente</div>`;
        setTimeout(function () {
          $("#decuento").fadeOut(3000);
        }, 3000);
        $("#activacion").show();
      }
    });
  }
}

function createResponseSurvey() {
  var data = $("#responseSurveys").serialize();
  console.log(data);
  var url = route("responseSurveys");
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    success: function (data) {
      $(this)
        .closest("tr")
        .remove();
      $("#response").html("");
      $("#response").append(
        `<div class="alert alert-success">
        <span>Encuesta enviada con exito, gracias por responder</span>
        </div>`
      );
      setTimeout(function () {
        $("#response").fadeOut(1500);
      }, 3000);
    }
  });
}

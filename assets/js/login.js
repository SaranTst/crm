  function login() {

    var url = base_url+'api/sales/login';
    var data = $( "form#frm_login" ).serialize();

    var id_sale = $("input[name^=id_sale]");
    var password = $("input[name^=password]");

    if (! id_sale.val()) {
        id_sale.addClass("border border-danger").siblings("p.text-danger").css("display","block");
    }else if (! password.val()){
        password.addClass("border border-danger").siblings("p.text-danger").css("display","block");
    }else{

        $.ajax({
            url: url,
            type:"POST",
            data: data,
            dataType:"json",
            success: function( resp ){
                if (resp.status==1) {
                  window.location.href = base_url+"dashboard";
                }else{
                  Swal.fire({
                    title: 'Warning!',
                    text: resp.message,
                    type: 'warning'
                  }).then((result) => {
                    if (result.value || result.dismiss == "backdrop") {
                      $('form#frm_login')[0].reset();
                    }
                  })
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                  Swal.fire({
                    title: jqXhr.status,
                    text: errorThrown,
                    type: 'error'
                  }).then((result) => {
                    if (result.value) {
                      $('form#frm_login')[0].reset();
                    }
                  })
            }
        });
    }
  }

  $("input", $("form#frm_login")).on("keyup", function(){
    $(this).removeClass("border border-danger").siblings("p.text-danger").css("display","none");
  })
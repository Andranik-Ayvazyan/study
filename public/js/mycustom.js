$(document).ready(function(){

    $(document).on('click', ".prod_edit", function(e){

       e.stopPropagation();

       $("#editModal").attr('data-id',$(this).data('id'));

       $("#editModal").modal("show");

    });

    $("#editModal").on('show.bs.modal', function () {

        var elem = $(this);

        var url = 'http://laratask/admin/products/'+elem.attr('data-id')+'/edit';

       $.ajax({

            url:url,
            success: function(result){

                elem.find('[name="name"]').val(result.name);
                elem.find('[name="description"]').val(result.description);
                elem.find('[name="quantity"]').val(result.quantity);
                elem.find('[name="price"]').val(result.price);
                elem.find('form').attr('action','http://laratask/admin/products/'+result.id);

            }
        })
    });


    $("#editModal .save").click(function(){

        var form = this.closest('form');

        var formData = new FormData(form);

        $.ajax({

            url: $(form).attr('action'),
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,

            success: function(result){

               if (result.status) {

                   $('#datatable').DataTable().ajax.reload();

                   $("#editModal").modal("hide");


               }

            }
        })
    })

    $(document).on('click','.prod_del', function(e) {
        e.stopPropagation();

        $("#deleteModal").attr('data-id',$(this).data('id'));

        $("#deleteModal").modal("show");

    })


    $(document).on('click','.delete',function(){

        var elem = $(this).closest('.modal');
        ;

        var url = "http://laratask/admin/products/"+elem.attr('data-id');


        $.ajax({

            url:url,
            type:'post',
            data:'_method = DELETE',
            processData: false,
            contentType: false,

            success: function(result){

                if(result.status) {
                    
                    $('#datatable').DataTable().ajax.reload();

                    $("#deleteModal").modal("hide");
                }
            }
        })


    })

    $(document).on('click', '.create_prod', function() {

       $("#addModal").modal("show");

    })



    
    

    
    function fillPanelBody (response,object) {

        $(object.body).empty()

            for(i = 0; i < response.products.length; i++) {

                $(object.body).append("<a href = 'http://laratask/products/"+response.products[i].id+"'>"+
                    "<div class='product_item'>"+
                    "<div class='prod_img'>"+
                    "<img src='"+response.products[i].image+"' alt='product image' width=200 height='120'>"+
                    "</div>"+
                    "<hr>"+
                    "<h3><a href='http://laratask/products/"+response.products[i].id+"'>"+response.products[i].name+"</a></h3>"+
                    "<h3 class='item_price'>"+response.products[i].price+"</h3>"+
                    "</div>"+
                    "</a>");

            }

    }


    $('[data-plugin="panel"]').panelWidget({

        content:{

            ajax: {

               url: 'http://laratask',
               data: {page:0},
               callback: function (response, object) {

                       // drowPagination(response, object);

                        fillPanelBody (response, object);

                }
            }
        }

    });

});
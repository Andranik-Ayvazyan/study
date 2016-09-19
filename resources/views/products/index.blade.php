@extends('layouts.admin')

@section('content')

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Products <small>Here you can  modify products</small></h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Main table <small>Products</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li class="dropdown">
              <a class="dropdown-toggle create_prod" >Add Product</a>
            </li>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th class="prod_desc">Description</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit product</h4>
          </div>
          <div class="modal-body">
            <form  method ='post' id = 'edit_form'>
              <input type="hidden" name="_method" value = 'PUT'>
              <div class="form-group">
                <label>Name:</label>
                <input type="text"  name = 'name'  class="form-control"  >
              </div>
              <div class="form-group">
                <label>Description:</label>
                <textarea name = 'description' class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Quantity:</label>
                <input type="text" name = 'quantity' class="form-control"  >
              </div>
              <div class="form-group">
                <label>Price:</label>
                <input type="text" name = 'price' class="form-control" >
              </div>
              <button type="button" class="btn btn-default save">Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>

        </div>
      </div>
    </div>


    <div class="modal fade" id="deleteModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete product</h4>
          </div>
          <div class="modal-body">
            <form  method ='post' id = 'edit_form'>
              <h5>Do you want to delete this product ?</h5>
              <button type="button" class="btn btn-default delete">Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>

        </div>
      </div>
    </div>


    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add product</h4>
          </div>
          <div class="modal-body">
            <form  method ='post' action = 'http://laratask/admin/products'>
              {{csrf_field()}}
              <div class="form-group">
                <label>Name:</label>
                <input type="text"  name = 'name'  class="form-control"  >
              </div>
              <div class="form-group">
                <label>Description:</label>
                <textarea name = 'description' class="form-control"  ></textarea>
              </div>
              <div class="form-group">
                <label>Quantity:</label>
                <input type="text" name = 'quantity' class="form-control"  >
              </div>
              <div class="form-group">
                <label>Price:</label>
                <input type="text" name = 'price' class="form-control" >
              </div>
              <button type="submit" class="btn btn-default add">Add product</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>

        </div>
      </div>
    </div>


   </div>
 </div>
</div>

@stop



@push('scripts')

<script>

  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    });
    $('#datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '{!! route('products.data') !!}',
        type:'post'
      },
      columns: [

        { data: 'id', id: 'id' },
        { data: 'name', name: 'name' },
        { data: 'description', name: 'description' },
        { data: 'quantity', name: 'quantity' },
        { data: 'price', name: 'price' },
        { data: 'action', name: 'action'}

      ]
    });
  });

</script>

@endpush

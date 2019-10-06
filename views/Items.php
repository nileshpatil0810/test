<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
</head>
<body>

<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h3>Login Successful <?=$this->session->userdata('first_name')?>  <?=$this->session->userdata('last_name')?> <?=$this->session->userdata('user_id')?></h3>
        <a href="<?= base_url();?>auth/logout">Logout</a>
      </div>
      <div class="pull-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item"> Create Item</button>
        <div class="pull-left">
        <a href="<?= base_url();?>items/chat_box"><button type="button" class="btn btn-success" id="chat_box"> Enter in chat</button>
      </div>
    </div>
</div>


<table class="table table-bordered">


  <thead>
      <tr>
          <th>Title</th>
          <th>Description</th>
          <th width="200px">Action</th>
      </tr>
  </thead>


  <tbody>
  </tbody>


</table>

<!-- Paginate -->

<ul id="pagination" class="pagination-sm"></ul>
<input type="hidden" name="user_id" value = <?=$this->session->userdata('user_id')?>>
<!-- Create Item Modal -->
<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">


  <div class="modal-dialog" role="document">
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Item</h4>
      </div>


      <div class="modal-body">


            <form data-toggle="validator" action="store" method="POST">


                <div class="form-group">
                    <label class="control-label" for="title">Title:</label>
                    <input type="text" name="title" class="form-control" data-error="Please enter title." required />
                    <div class="help-block with-errors"></div>
                </div>


                <div class="form-group">
                    <label class="control-label" for="title">Description:</label>
                    <textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
                    <div class="help-block with-errors"></div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn crud-submit btn-success">Submit</button>
                </div>


            </form>


      </div>


    </div>
  </div>
</div>


<!-- Edit Item Modal -->
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">


  <div class="modal-dialog" role="document">
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
      </div>


      <div class="modal-body">


            <form data-toggle="validator" action="update" method="post">


                <div class="form-group">
                    <label class="control-label" for="title">Title:</label>
                    <input type="text" name="title" class="form-control" data-error="Please enter title." required />
                    <div class="help-block with-errors"></div>
                </div>


                <div class="form-group">
                    <label class="control-label" for="title">Description:</label>
                    <textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <input type="hidden" id = "get_id" name = "get_id" value = "">

                <div class="form-group">
                    <button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
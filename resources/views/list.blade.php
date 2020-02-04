<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Ajax To-Do List</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">To Do <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Cras justo odio</li>
                                <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Dapibus ac facilisis in</li>
                                <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Morbi leo risus</li>
                                <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Porta ac consectetur ac</li>
                                <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Vestibulum at eros</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="modal" id="myModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="title">Add new item</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <input type="text" class="form-control" name="addItem" id="addItem" placeholder="Write Item Here">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning" id="delete" data-dismiss="modal" style="display: none;">Delete</button>
                          <button type="button" class="btn btn-primary" id="saveChanges" style="display: none;">Save changes</button>
                          <button type="button" class="btn btn-primary" id="AddButton">Add Item</button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $('.ourItem').each(function() {
          $(this).click(function(event) {
            var text = $(this).text();
            $('#title').text('Edit Item');
            $('#delete').show();
            $('#saveChanges').show();
            $('#AddButton').hide();
            $('#addItem').val(text);
          });
        });
      });
    </script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous" />
    <title>Ajax To-Do List</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">To Do <a href="#" class="pull-right" id="addNew" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group" id="items">
                                @foreach ($items as $item)
                                  <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal" data-id="{{ $item->id }}">{{ $item->item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 mx-auto mt-3">
                  <input type="text" class="form-control" name="searchItem" id="searchItem" placeholder="Search">
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
                          <input type="hidden" id="id">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning" id="delete" data-dismiss="modal" style="display: none;">Delete</button>
                          <button type="button" class="btn btn-primary" id="saveChanges" data-dismiss="modal" style="display: none;">Save changes</button>
                          <button type="button" class="btn btn-primary" id="AddButton" data-dismiss="modal">Add Item</button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
    </div>
    {{ csrf_field() }}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $(document).on('click', '.ourItem', function(event) {
          event.preventDefault();
          var text = $(this).text();
          var id = $(this).attr("data-id");
          $('#title').text('Edit Item');
          $('#addItem').val(text);
          $('#delete').show();
          $('#saveChanges').show();
          $('#AddButton').hide();
          $('#id').val(id);
        });

        $('#addNew').click(function(event) {
          $('#title').text('Add New Item');
          $('#addItem').val("");
          $('#delete').hide();
          $('#saveChanges').hide();
          $('#AddButton').show();
        });

        $('#AddButton').click(function(event) {
          var text = $('#addItem').val();
          if(text == ""){
            alert('Please fill in the item.');
          }else{
            $.post('list', {'text': text ,'_token': $('input[name=_token]').val()}, function(data) {
              $('#items').load(location.href + ' #items');
            });
          }
        });

        $('#delete').click(function(event) {
          var id = $('#id').val();
          $.post('delete', {'id': id ,'_token': $('input[name=_token]').val()}, function(data) {
            $('#items').load(location.href + ' #items');
          });
        });

        $('#saveChanges').click(function(event) {
          var id = $('#id').val();
          var value = $('#addItem').val();
          $.post('update', {'id': id , 'value': value, '_token': $('input[name=_token]').val()}, function(data) {
            $('#items').load(location.href + ' #items');
          });
        });

        $(function(){
          $("#searchItem").autocomplete({
            source: 'http://localhost:8000/search'
          });
        });
      });
    </script>
  </body>
</html>
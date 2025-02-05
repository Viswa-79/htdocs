<html>
    <head>
        
        
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $('.search').on('keyup',function(){
                var searchTerm = $(this).val().toLowerCase();
                $('#userTbl tbody tr').each(function(){
                    var lineStr = $(this).text().toLowerCase();
                    if(lineStr.indexOf(searchTerm) === -1){
                        $(this).hide();
                    }else{
                        $(this).show();
                    }
                });
            });
        });
        </script>
</head>
<body>    
<div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
</div>
<table class="table table-striped" id="userTbl">
    <thead>
    <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>John</td>
        <td>Moe</td>
        <td>john@moe.com</td>
    </tr>
    <tr>
        <td>Mary</td>
        <td>Doe</td>
        <td>mary@doe.com</td>
    </tr>
    <tr>
        <td>July</td>
        <td>Rest</td>
        <td>july@gmail.com</td>
    </tr>
    </tbody>
</table>
</body>
</html>
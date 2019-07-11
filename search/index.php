<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Search box</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        
        <h3>Search by employee's first name</h3>
        <div class="form-inputs">
            <input type="text" placeholder="Enter search.." id="nameInput"/>       
        </div>
    
        <h4>Results of query</h4>
        <div id="results">
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        
        <script>
            $("#nameInput").keypress(function(event) {
                if (event.which == 13) { 
                    console.log($('#nameInput').val())
                    $nameInput = $('#nameInput').val();                                 
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {
                            todo: 'getResult', 
                            nameInput: $nameInput
                        },
                        success: function(data) {
                            $('#results').html(data);
                        }
                    })            
                }
            })
            
        </script>

    </body>
</html>
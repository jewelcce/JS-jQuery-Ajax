<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajax</title>
    <style>
        #title{
            background-color: #32cd32;
            color:#ffffff;
        }
    </style>
</head>
<body>

<h1 id="title"  >Welcome to jQuery</h1>

<button id="clkBtn" type="button"> Change Effect </button>

<div id="countryList"></div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

    $(document).ready(function(){

        $('#clkBtn').bind('click',function(){

            $('#title').css({
                'background-color' : '#066ccd',
                'color' : '#cad0ff'
            });

            $.ajax({

                url: "countries.php",
                dataType:'JSON'

            }).done(function(response) {

                console.log(response);

                var html = '<table><tr><th>ID</th><th>Country</th><th>City</th></tr>';

                $.each(response,function(property,value){

                    id = property;
                    country = value.name;
                    city = value.city;

                    html = html + '<tr><td>'+id+'</td><td>'+country+'</td><td>'+city+'</td></tr>';

                    // this is complex to understand
                    // step 1 : table header will be added along with 1st loop's content into "html" variable
                    // step 2 : value of "html" will concatenate with 2nd loop's
                    // this process will continue until loop is not end

                });

                htmlData = html + '</table>';

                $('#countryList').html(htmlData);
            });

        });
    })

</script>
</body>
</html>
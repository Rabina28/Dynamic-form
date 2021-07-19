
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dynamic-form-design</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <br />
    <h3 align="center">Dynamically Add/Remove input fields </h3>
    <br />
    <div class="table-responsive">
        <form method="post" enctype="multipart/formdata">
            {{ csrf_field() }}
            <span id="result"></span>
            <table class="table table-bordered table-striped" id="user_table">
                <thead>
                <tr>
                    <th width="35%">Name</th>
                    <th width="35%">Type</th>
                    <th width="30%">Length</th>
                    <th width="35%">Not null</th>
                    <th width="35%">Unsigned</th>
                    <th width="30%">Auto increment</th>
                    <th width="35%">Index</th>
                    <th width="30%">Default</th>
                    <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2" align="right">&nbsp;</td>
                    <td>

                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                    </td>

                </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>
</body>
</html>

<script>
    $(document).ready(function(){

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number)
        {

            html = '<tr>';
            html += '<td><input type="text" name="name[]" class="form-control" /></td>';
            html += '<td><select><option value="Select">NONE</option><option title="A 4-byte integer, signed range is -2,147,483,648 to 2,147,483,647, unsigned range is 0 to 4,294,967,295">INT</option>' +
                '<option title="A variable-length (0-65,535) string, the effective maximum length is subject to the maximum row size">VARCHAR</option>' +
                '<option title="A TEXT column with a maximum length of 65,535 (2^16 - 1) characters, stored with a two-byte prefix indicating the length of the value in bytes">TEXT</option>' +
                '<option title="A date, supported range is 1000-01-01 to 9999-12-31">DATE</option>' +
                '<optgroup label="Numeric">' +
                ' <option title="A 1-byte integer, signed range is -128 to 127, unsigned range is 0 to 255">TINYINT</option>' +
                '<option title="A 2-byte integer, signed range is -32,768 to 32,767, unsigned range is 0 to 65,535">SMALLINT</option>' +
                '<option title="A 3-byte integer, signed range is -8,388,608 to 8,388,607, unsigned range is 0 to 16,777,215">MEDIUMINT</option>' +
                '<option title="A 4-byte integer, signed range is -2,147,483,648 to 2,147,483,647, unsigned range is 0 to 4,294,967,295">INT</option>' +
                '<option title="An 8-byte integer, signed range is -9,223,372,036,854,775,808 to 9,223,372,036,854,775,807, unsigned range is 0 to 18,446,744,073,709,551,615">BIGINT</option>' +
                '<option title="A fixed-point number (M, D) - the maximum number of digits (M) is 65 (default 10), the maximum number of decimals (D) is 30 (default 0)">DECIMAL</option>' +
                '<option title="A small floating-point number, allowable values are -3.402823466E+38 to -1.175494351E-38, 0, and 1.175494351E-38 to 3.402823466E+38">FLOAT</option>' +
                '<option title="A synonym for TINYINT(1), a value of zero is considered false, nonzero values are considered true">BOOLEAN</option>' +
                '<optgroup label="Date and time">' +
                '<option title="A date, supported range is 1000-01-01 to 9999-12-31">DATE</option>' +
                '<option title="A date and time combination, supported range is 1000-01-01 00:00:00 to 9999-12-31 23:59:59">DATETIME</option>' +
                '<option title="A timestamp, range is 1970-01-01 00:00:01 UTC to 2038-01-09 03:14:07 UTC, stored as the number of seconds since the epoch (1970-01-01 00:00:00 UTC)">TIMESTAMP</option>' +
                '<option title="A time, range is -838:59:59 to 838:59:59">TIME</option>' +
                '<option title="A year in four-digit (4, default) or two-digit (2) format, the allowable values are 70 (1970) to 69 (2069) or 1901 to 2155 and 0000">YEAR</option></optgroup>' +
                '</select></td>';

            html += '<td><input type="text" name="length[]" class="form-control" /></td>';
            html += '<td><input type="checkbox" name="not_null[]" class="allow_null" /></td>';
            html += '<td><input type="checkbox" name="unsigned[]" class="allow_null" /></td>';
            html += '<td><input type="checkbox" name="auto_increment[]" class="allow_null" /></td>';
            html += '<td><select><option value="Select">NONE</option>' +
                '<option value="primary_0" title="Primary">PRIMARY </option> ' +
                '<option value="unique_0" title="Unique">UNIQUE </option>' +
                '<option value="index_0" title="Index">INDEX </option>' +
                '<option value="fulltext_0" title="Fulltext">FULLTEXT </option>' +
                '<option value="spatial_0" title="Spatial">SPATIAL </option>' +
                '</select></td>';
            html += '<td><select><option value="Select">NONE</option>' +
                ' <option value="USER_DEFINED">As defined:  </option>' +
                '<option value="NULL"> NULL </option>' +
                '<option value="CURRENT_TIMESTAMP">CURRENT_TIMESTAMP</option>' +
                '</select> </td>';
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            }
            else
            {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("tr").remove();
        });

        $('#dynamic_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:'{{ route("dynamic-field.insert") }}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $('#save').attr('disabled','disabled');
                },
                success:function(data)
                {
                    if(data.error)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<p>'+data.error[count]+'</p>';
                        }
                        $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                    }
                    else
                    {
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });

    });
</script>

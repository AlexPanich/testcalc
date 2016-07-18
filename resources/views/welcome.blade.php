<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <form action="" class="form-horizontal" id="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="one">Первое число:</label>
                <input type="number" class="form-control" id="one" name="one">
            </div>
            <div class="form-group">
                <label for="two">Второе число:</label>
                <input type="number" class="form-control" id="two" name="two">
            </div>
            <div class="form-group" id="btnGroup">
                <button type="button" id="">+</button>
            </div>
            <span id="result"></span>
        </form>
    </div>
</div>
<script>
    var btnGroup = document.getElementById('btnGroup');

    btnGroup.addEventListener('click', function (e) {
        if (e.target.tagName != 'BUTTON') {
            return false;
        }

        var operator = encodeURIComponent(e.target.textContent);
        var one = +document.getElementById('one').value,
            two = +document.getElementById('two').value;

        var params = 'operator=' + operator + '&one=' + one + '&two=' + two;

        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'api/calc?' + params, true);

        xhr.addEventListener('load', function() {
            var result = document.getElementById('result');
            result.textContent = JSON.parse(xhr.responseText).result;
        });

        xhr.addEventListener('error', function() {
            var result = document.getElementById('result');
            result.textContent = 'error';
        });

        xhr.send();

    });
</script>
</body>
</html>

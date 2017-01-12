<html>
<head>


</head>
<body>
<form method="post">
    {{ csrf_field() }}
    <input name="title" placeholder="Entet title here">
    <br>
    <textarea name="description" placeholder="Enter Description here"></textarea>
    <br>
    <button type="submit">Click me to save task</button>
</form>

</body>
</html>
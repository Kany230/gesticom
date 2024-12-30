<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUESTION</title>
</head>
<body>
    <h3>Est ce que voulez-vous faire votre rapport</h3>
    <form action="{{route('rapports.question')}}" method="GET">
        @csrf
        <button type="submit" name="response" value="oui">OUI</button>
        <button type="submit" name="response" value="non">NON</button>
    </form>
</body>
</html>
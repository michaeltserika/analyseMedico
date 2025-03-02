<!DOCTYPE html>
<html>
<head>
    <title>Liste des Patients</title>
</head>
<body>
    <h1>Liste des Patients</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->nom }}</td>
                <td>{{ $patient->prenom }}</td>
                <td>{{ $patient->telephone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

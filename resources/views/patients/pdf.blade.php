<!DOCTYPE html>
<html>
<head>
    <title>Liste des Patients</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #075E54; padding: 10px; text-align: left; }
        th { background: #25D366; color: white; }
        h1 { color: #075E54; text-align: center; }
    </style>
</head>
<body>
    <h1><i class="fas fa-user me-2"></i> Liste des Patients</h1>
    <table>
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

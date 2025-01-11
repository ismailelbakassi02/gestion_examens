

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
    }

    h1 {
        color: #333;
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
        text-align: center;
        font-size: 24px;
    }

    .note {
        margin-top: 20px;
        overflow-x: auto; /* Permet de scroller horizontalement si le tableau dépasse */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    td {
        color: #333;
    }

    .form-buttons {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .form-buttons a.btn-secondary {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        background-color: #6c757d;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .form-buttons a.btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

</head>
<body>
    <div class="form-container">
        <h1>Notes</h1>
        <div class="note">
        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>Module</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notes as $note): ?>
                    <tr>
                        <td><?= $note->module_name ?></td>
                        <td><?= $note->note ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong>Moyenne générale</strong></td>
                    <td><strong><?= number_format($note_generale, 2) ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
            <div class="form-buttons">
                <a href="<?= base_url('dashboard') ?>" class="btn-secondary">Tableau de bord</a>
            </div>
    </div>
</body>
</html>
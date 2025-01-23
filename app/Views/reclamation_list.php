<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamations List</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Reclamations List</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Module Name</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($reclamations)): ?>
                <?php foreach ($reclamations as $reclamation): ?>
                    <tr>
                        <td><?=$reclamation['module_name'] ?></td>
                        <td><?= esc($reclamation["commentaire"])  ?></td>
                        <td>
                            <?php if ($reclamation['etat'] == 'En attent'): ?>
                                <span class="badge bg-warning">En Attent</span>
                            <?php elseif ($reclamation['etat'] == 'accepter'): ?>
                                <span class="badge bg-success">Accepter</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Réfuser</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">No reclamations found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réclamation de Note</title>
    <!-- Lien vers Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <h1 class="text-center mb-4">Réclamation de Note</h1>
                <a href="<?= base_url("/dashboard")?>">Retour</a>
                <div class="card shadow">
                    <div class="card-body">
                        <form action=<?= base_url('reclamation/student/reclamer')?> method="post">
                            <?= csrf_field() ?> <!-- Protection CSRF -->

                           
                            <div class="mb-3">
                                <label for="module" class="form-label">Module :</label>
                                <input type="text" value="<?=$module->nom_module?>" readonly>
                                <input type="hidden" name='module_id' value="<?=$module->id_module?>" readonly>

                             
                                
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Note Contestée :</label>
                                <input type="number" readonly step="0.01" name="note" id="note" class="form-control"  value="<?= $note["note"] ?>">
                                <input type="hidden" readonly step="0.01" name="note_id" id="note_id" class="form-control"  value="<?= $note["id_note"] ?>">

                            </div>

                            <div class="mb-3">
                                <label for="commentaire" class="form-label">Commentaire :</label>
                                <textarea name="commentaire" id="commentaire" class="form-control" rows="5" placeholder="Expliquez pourquoi vous contestez la note..." required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Envoyer Réclamation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4><?= $pageTitle ?>
                            <a href="index.php?action=index" class="btn btn-danger float-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php if ($formType === 'create'): ?>
                            <form action="index.php?action=store" method="POST">
                            <?php else: ?>
                                <form action="index.php?action=update" method="POST">
                                    <input type="hidden" name="id" value="<?= $this->user->id ?>">
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="<?= $formType === 'edit' ? $this->user->name : '' ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?= $formType === 'edit' ? $this->user->email : '' ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" rows="3"><?= $formType === 'edit' ? $this->user->address : '' ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="<?= $formType === 'edit' ? $this->user->phone : '' ?>">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <?= $formType === 'create' ? 'Save User' : 'Update User' ?>
                                    </button>
                                </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
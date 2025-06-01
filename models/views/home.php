<?php include 'templates/header.php'; ?>
<div class="container">
    <h2>Movie/TV Show Catalog</h2>
    <form method="GET" action="index.php?page=home" class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search by title">
            </div>
            <div class="col-md-4">
                <select name="genre" class="form-control">
                    <option value="">All Genres</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Comedy">Comedy</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <div class="row">
        <?php foreach ($mediaItems as $item): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h5>
                        <p class="card-text">Genre: <?php echo htmlspecialchars($item['genre']); ?></p>
                        <p class="card-text">Year: <?php echo htmlspecialchars($item['release_year']); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'templates/footer.php'; ?>
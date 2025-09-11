<?php
require_once 'includes/auth.php';
redirectIfNotLoggedIn();
require_once 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Now Showing</h2>
    <div class="d-flex">
        <input type="text" class="form-control me-2" placeholder="Search movies..." id="searchInput">
        <select class="form-select" id="genreFilter">
            <option value="">All Genres</option>
            <option value="action">Action</option>
            <option value="comedy">Comedy</option>
            <option value="drama">Drama</option>
            <option value="sci-fi">Sci-Fi</option>
        </select>
    </div>
</div>

<div class="row" id="movieList">
    <!-- Movies will be loaded here by JavaScript -->
</div>

<?php
require_once 'includes/footer.php';
?>
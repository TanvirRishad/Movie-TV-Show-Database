<?php
require_once 'models/Media.php';

class MediaController {
    private $media;

    public function __construct($pdo) {
        $this->media = new Media($pdo);
    }

    public function showHome() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $genre = $_GET['genre'] ?? '';
        $search = $_GET['search'] ?? '';
        $mediaItems = $this->media->getAllMedia($genre, $search);
        include 'views/home.php';
    }
}
?>
<?php
    require_once 'Album.php';

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    $createCacheAction = 'createCache';
    $loadAlbumAction = 'loadAlbum';
    $getMusicAction = 'getMusic';
    $findMusicAction = 'findMusic';
    $cachePath = '/var/www/src/rest/album/savedAlbums';
    $musicPath = '/var/www/music';

    $action = $_GET['action'];
    $page =  $_GET['page'];
    $idMusic = $_GET['id'];
    $musicName = $_GET['musicName'];

    if(! $action) {
        echo json_encode(['status' => 'ERROR', 'message' => 'action.not.found']);
    }

    $album = new Album();
    $album->setCachePath($cachePath);
    $album->setMusicPath($musicPath);
    $album->setPaginationLimit(10000);

    try {
        if ($action == $createCacheAction) {
            echo json_encode($album->createCache());
        }

        if ($action == $loadAlbumAction) {
            echo json_encode($album->loadAlbums($page));
        }

        if ($action == $getMusicAction) {
            echo json_encode($album->getMusicById($idMusic));
        }

        if ($action == $findMusicAction) {
            echo json_encode($album->findMusic($musicName));
        }
    } catch (\Execption $e) {
        echo json_encode(['status' => 'ERROR', 'message' => $e->getMessage()]);
    }

<?php
    require_once 'Album.php';

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:8080');

    $createCacheAction = 'createCache';
    $loadAlbumAction = 'loadAlbum';
    $getMusicAction = 'getMusic';
    $cachePath = '/var/www/src/rest/album/savedAlbums';
    $musicPath = '/music/Musicas';

    $action = $_GET['action'];
    $page =  $_GET['page'];
    $idMusic = $_GET['id'];

    if(! $action) {
        echo json_encode(['status' => 'ERROR', 'message' => 'action.not.found']);
    }

    $album = new Album();
    $album->setCachePath($cachePath);
    $album->setMusicPath($musicPath);
    $album->setPaginationLimit(10000);

    if ($action == $createCacheAction) {
        $album->createCache();
    }

    if ($action == $loadAlbumAction) {
        echo json_encode($album->loadAlbums($page));
    }

    if ($action == $getMusicAction) {
        print json_encode($album->getMusicById($idMusic));

    }

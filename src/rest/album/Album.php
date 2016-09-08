<?php
class Album
{
    protected static $content = array();
    protected static $album = array();
    protected static $musicPath;
    protected static $cachePath;
    protected static $allowedExtensions = ['mp3', 'ogg', 'flac', 'm4a'];
    protected static $paginationLimit;
    protected static $minimumAlbumLen = 5;
    protected static $interator = 1;

    public function setMusicPath($musicPathParam)
    {
        Album::$musicPath = $musicPathParam;
    }

    public function getMusicPath()
    {
        return Album::$musicPath;
    }

    public function setPaginationLimit($paginationLimitParam)
    {
        Album::$paginationLimit = $paginationLimitParam;
    }

    public function getPaginationLimit()
    {
        return Album::$paginationLimit;
    }

    public function setCachePath($cachePathParam)
    {
        Album::$cachePath = $cachePathParam;
    }

    public function getCachePath()
    {
        return Album::$cachePath;
    }

    public function setMinimumAlbumLen($minimumAlbumLen)
    {
        Album::$minimumAlbumLen = $minimumAlbumLen;
    }

    public function getMinimumAlbumLen()
    {
        return Album::$minimumAlbumLen;
    }

    protected function setAlbum($albumArray)
    {
        Album::$album[] = $albumArray;
    }

    protected function getAlbum()
    {
        return Album::$album;
    }

    public function createCache()
    {
        $directoryIterator = new RecursiveDirectoryIterator(Album::$musicPath);

        foreach ($directoryIterator as $directory) {
            $album = substr($directory->getPathName(), strrpos($directory->getPathName(), '/') + 1);

            if ($directory->isDir() && strlen($album) > $this->getMinimumAlbumLen()) {

                $path =  substr($directory->getPathName(),8);
                $subDirectoryIterator  = new RecursiveDirectoryIterator($directory->getPathName());
                $musics = null;

                foreach ($subDirectoryIterator as $subDirectory) {
                    if ($subDirectory->isFile() && in_array($subDirectory->getExtension(), Album::$allowedExtensions)) {
                        $musics[] = [
                            'id' => Album::$interator,
                            'musicName' => substr($subDirectory->getPathName(),strrpos($subDirectory->getPathName(), '/') + 1),
                            'extension' => '.' . $subDirectory->getExtension()
                        ];
                        Album::$interator++;
                    }
                }

                if (count($musics)) {
                    $this->setAlbum(['albumName' => $album, 'path' => $path, 'musics' => $musics]);
                }
            }
        }

        $this->saveAlbum($this->getAlbum());
        return $this->loadAlbums(1);
    }

    protected function getMusicsRecursive(RecursiveDirectoryIterator $directoryIterator)
    {
        $response = [];

        if ($directoryIterator->isDir()) {
            $directory  = new RecursiveDirectoryIterator($directoryIterator->getPathName());
            var_dump($directory);
            exit();
            foreach ($directory as $subDirectory) {
                if ($subDirectory->isFile() && in_array($subDirectory->getExtension(), Album::$allowedExtensions)) {
                    $musics[] = [
                        'id' => Album::$interator,
                        'albumName' => substr($subDirectory->getPathName(), strrpos($subDirectory->getPathName(), '/') + 1),
                        'path' => substr($subDirectory->getPathName(),strrpos($subDirectory->getPathName(), 'w') + 1),
                        'musicName' => substr($subDirectory->getPathName(),strrpos($subDirectory->getPathName(), '/') + 1),
                        'extension' => '.' . $subDirectory->getExtension()
                    ];
                    Album::$interator++;
                    $response[] = $musics;
                } else {
                    $response[] = $this->getMusicsRecursive();
                }
            }
        }

        return $response;
    }

    public function loadAlbums($page)
    {
        $cache = unserialize(file_get_contents($this->getCachePath() . DIRECTORY_SEPARATOR . 'Cache'));
        $initialMusic = $page * $this->getPaginationLimit() - $this->getPaginationLimit();
        $finalMusic = $initialMusic + $this->getPaginationLimit();
        $id = 0;

        for ($i = $initialMusic; $i <= $finalMusic; $i++) {
            if ($cache['albums'][$i]) {
                $album[] = $cache['albums'][$i];
            }
        }

        $album = $this->sortArray($album, 'albumName');

        return $album;
    }

    public function getMusicById($id)
    {
        $cache = unserialize(file_get_contents($this->getCachePath() . DIRECTORY_SEPARATOR . 'Cache'));

        foreach ($cache['albums'] as $album) {
            foreach ($album['musics'] as $music) {
                if ($music['id'] == $id) {
                    $musicResult = $music;
                    $musicResult['pathFile'] = $album['path'];
                }
            }
        }

        return $musicResult;
    }

    protected function saveAlbum($album) {

        $cache['totalAlbums'] = count($album);
        $cache['albums'] = $album;

        $content = serialize($cache);

        file_put_contents($this->getCachePath() . DIRECTORY_SEPARATOR . 'Cache', $content);
    }

    protected function sortArray($array, $fieldToSort)
    {
        foreach ($array as $itemArray) {
            $parsedArray[$itemArray[$fieldToSort]] = $itemArray;
        }

        ksort($parsedArray);

        foreach ($parsedArray as $parsedItem) {
            $sortedArray[] = $parsedItem;
        }

        return $sortedArray;
    }
}

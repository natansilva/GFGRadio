<?php
class Album
{
    protected static $content = array();
    protected static $album = array();
    protected static $musicPath;
    protected static $cachePath;
    protected static $allowedExtensions = array('mp3','wma','wma');
    protected static $paginationLimit;
    protected static $minimumAlbumLen = 5;

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
        $i = 1;

        foreach ($directoryIterator as $directory) {
            $album = substr($directory->getPathName(),strrpos($directory->getPathName(), '/') + 1);
            $path = $directory->getPathName() . DIRECTORY_SEPARATOR;

            if ($directory->isDir() && strlen($album) > $this->getMinimumAlbumLen()) {
                $subDirectoryIterator  = new RecursiveDirectoryIterator($path);
                $musics = null;

                foreach ($subDirectoryIterator as $subDirectory) {
                    if ($subDirectory->isFile() && in_array($subDirectory->getExtension(), Album::$allowedExtensions)) {
                        $musics[] = [
                            'id' => $i,
                            'musicName' => substr($subDirectory->getPathName(),strrpos($subDirectory->getPathName(), '/') + 1),
                            'extension' => '.' . $subDirectory->getExtension()
                        ];
                        $i++;
                    }
                }
                $this->setAlbum(['albumName' => $album, 'path' => $path, 'musics' => $musics]);
            }
        }

        $this->saveAlbum($this->getAlbum());
    }

    public function loadAlbums($page)
    {

        $cache = unserialize(file_get_contents($this->getCachePath() . DIRECTORY_SEPARATOR . 'Cache'));

        $initialMusic = $page * $this->getPaginationLimit() - $this->getPaginationLimit();
        $finalMusic = $initialMusic + $this->getPaginationLimit();


        for ($i = $initialMusic; $i <= $finalMusic; $i++) {
            $album[] = $cache['albums'][$i];
        }

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
}

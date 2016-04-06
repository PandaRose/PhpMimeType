<?php

use Defr\MimeType;

/**
 * Class MimeTypeTest
 * @author Dennis Fridrich <fridrich.dennis@gmail.com>
 */
class MimeTypeTest extends PHPUnit_Framework_TestCase
{
    public function testMimeTypesFromFileName()
    {
        $this->assertEquals('text/html', MimeType::get('index.html'));
        $this->assertEquals('application/octet-stream', MimeType::get('video.avi'));
        $this->assertEquals('image/jpeg', MimeType::get('picture.jpg'));
        $this->assertEquals('application/octet-stream', MimeType::get('some.strangeExtension'));
        $this->assertEquals('application/octet-stream', MimeType::get('fileWithoutExtension'));
        // non-existing file
        $this->assertEquals('application/octet-stream', MimeType::get("fake-file.omfg"));
    }

    public function testMimeTypesFromSplFileInfo()
    {
        $this->assertEquals('text/html', MimeType::get(new \SplFileInfo('index.html')));
        $this->assertEquals('application/octet-stream', MimeType::get(new \SplFileInfo('video.avi')));
        $this->assertEquals('image/jpeg', MimeType::get(new \SplFileInfo('picture.jpg')));
        $this->assertEquals('application/octet-stream', MimeType::get(new \SplFileInfo('some.strangeExtension')));
        $this->assertEquals('application/octet-stream', MimeType::get(new \SplFileInfo('fileWithoutExtension')));
    }

    public function testMimeTypesFromSplFileObject()
    {
        // self test (MimeTypeTest.php)
        $this->assertEquals('text/html', MimeType::get(new \SplFileObject(__FILE__)));
    }
}

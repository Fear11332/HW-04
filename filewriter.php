<?php

interface FileWriterInterface {
    public function writeLine(string $line): void;
}
class FileWriter implements FileWriterInterface {
    private $fileObject;

    public function __construct(string $filename) {
        $this->fileObject = new SplFileObject($filename, 'w');
    }

    public function writeLine(string $line): void {
        $this->fileObject->fwrite($line);
    }
}
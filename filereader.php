<?php

interface FileReaderInterface {
    public function readLine(): ?string;
}

class FileReader implements FileReaderInterface {
    private $fileObject;

    public function __construct(string $filename) {
        if (!file_exists($filename)) {
            throw new RuntimeException("Файл '$filename' не найден.");
        }
        if (!is_readable($filename)) {
            throw new RuntimeException("Нет прав на чтение файла '$filename'.");
        }
        $this->fileObject = new SplFileObject($filename, 'r');
    }

    public function readLine(): ?string {
        // Проверка на конец файла перед чтением
        if ($this->fileObject->eof()) {
            return null;
        }
        return $this->fileObject->fgets();
    }
}


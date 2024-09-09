<?php

class HTMLCleaner {
    private $reader;
    private $writer;
    private $filter;

    public function __construct(
        FileReaderInterface $reader,
        FileWriterInterface $writer,
        LineFilterInterface $filter
    ) {
        $this->reader = $reader;
        $this->writer = $writer;
        $this->filter = $filter;
    }

    public function clean(): void {
        while (($line = $this->reader->readLine())!==null) {
            if ($this->filter->filter($line)) {
                $this->writer->writeLine($line);
            }
        }
    }
}
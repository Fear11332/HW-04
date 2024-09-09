<?php
interface LineFilterInterface {
    public function filter(string $line): bool;
}
class MetaTagFilter implements LineFilterInterface {
    private $pattern;

    public function __construct(string $pattern) {
        $this->pattern = $pattern;
    }

    public function filter(string $line): bool {
        return !preg_match($this->pattern, $line);
    }
}

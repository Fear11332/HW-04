<?php   
    require_once 'bootstrap.php';

$filterPattern = '/<(title|meta\s+name=["\'](?:description|keywords)["\'])[^>]*>/i';
$inputFile = 'input.html';
$tempFile = 'temp.html';

// Чтение из исходного файла и запись в временный файл
$cleaner = new HTMLCleaner(new FileReader($inputFile), new FileWriter($tempFile), new MetaTagFilter($filterPattern));

$cleaner->clean();

// Перезаписываем исходный файл временным файлом
if (file_exists($tempFile)) {
    rename($tempFile, $inputFile);
}

echo "Файл $inputFile успешно отфильтрован и перезаписан.";
    
# Отчет о проделанной работе

## Цель задачи

Задача заключалась в разработке скрипта на PHP для удаления мета-тегов из HTML-файла. В частности, необходимо было вырезать теги `<title>`, а также мета-теги `<meta name="description">` и `<meta name="keywords">`. Решение должно было быть реализовано с использованием итеративного подхода.

## Подход и реализация

Для выполнения задачи был разработан код, который использует итерацию для обработки файла и удаления требуемых тегов. Код был организован в соответствии с принципами SOLID для обеспечения гибкости и поддерживаемости.

### Основные компоненты

1. **Интерфейс `FileReaderInterface`**:
   - Определяет метод для чтения строк из файла.
   - Позволяет абстрагироваться от конкретной реализации чтения файлов.

2. **Класс `FileReader`**:
   - Реализует интерфейс `FileReaderInterface`.
   - Открывает файл для чтения и читает строки по одной.
   - Обрабатывает ошибки, связанные с отсутствием или недоступностью файла.

3. **Интерфейс `FileWriterInterface`**:
   - Определяет метод для записи строк в файл.
   - Позволяет абстрагироваться от конкретной реализации записи файлов.

4. **Класс `FileWriter`**:
   - Реализует интерфейс `FileWriterInterface`.
   - Открывает файл для записи и записывает строки в файл.
   - Создает временный файл для записи очищенного содержимого.

5. **Интерфейс `LineFilterInterface`**:
   - Определяет метод для фильтрации строк.
   - Позволяет применять разные фильтры к строкам.

6. **Класс `MetaTagFilter`**:
   - Реализует интерфейс `LineFilterInterface`.
   - Использует регулярное выражение для фильтрации строк, содержащих мета-теги и заголовок `<title>`.

7. **Класс `HTMLCleaner`**:
   - Использует `FileReader`, `FileWriter` и `MetaTagFilter` для выполнения очистки HTML-файла.
   - Читает файл построчно, фильтрует строки и записывает очищенное содержимое в новый файл.
   - Перезаписывает исходный файл очищенным содержимым.

### Принципы SOLID

- **Single Responsibility Principle (SRP)**: Каждый класс имеет одну ответственность, например, `FileReader` только читает строки, `FileWriter` только записывает строки, а `MetaTagFilter` только фильтрует строки.
- **Open/Closed Principle (OCP)**: Классы расширяемы (например, можно создать новый фильтр), не изменяя существующий код.
- **Liskov Substitution Principle (LSP)**: Подклассы можно использовать вместо базовых классов без нарушения функциональности.
- **Interface Segregation Principle (ISP)**: Интерфейсы узкоспециализированные и предоставляют только необходимые методы.
- **Dependency Inversion Principle (DIP)**: Зависимости инвертированы в пользу абстракций, а не конкретных реализаций.

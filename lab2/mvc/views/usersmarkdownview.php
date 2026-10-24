<?php
declare(strict_types=1);

namespace MVC\Views;

/**
 * Представление списка пользователей в формате Markdown.
 */
class UsersMarkdownView extends ViewFactory
{
    const LAYOUT = <<<MD
# {{{title}}}

{{{body}}}
MD;

    protected $replacements;

    /**
     * Конструктор представления.
     * 
     * @param object $decorator Декоратор, предоставляющий данные (title и body)
     */
    public function __construct(object $decorator)
    {
        $this->replacements = [
            '{{{title}}}' => $decorator->title(),
            '{{{body}}}'  => $decorator->body()
        ];
    }

    /**
     * Рендеринг представления в формате Markdown.
     * 
     * @return string Отформатированная строка Markdown
     */
    public function render(): string
    {
        $body = $this->replacements['{{{body}}}'];
        
        // Заменяем <br /> на переносы строк для Markdown
        $body = str_replace('<br />', "\n\n", $body);
        
        // Убираем HTML-теги (например, <strong>)
        $cleanBody = strip_tags($body);
        
        $this->replacements['{{{body}}}'] = $cleanBody;
        
        return str_replace(
            array_keys($this->replacements),
            array_values($this->replacements),
            self::LAYOUT
        );
    }
}
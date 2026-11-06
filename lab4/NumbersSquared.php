<?php
class NumbersSquared implements Iterator
{
    private $start;
    private $end;
    private $current;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end   = $end;
        $this->current = $start;
    }

    public function rewind(): void
    {
        $this->current = $this->start;
    }

    public function valid(): bool
    {
        return $this->current <= $this->end;
    }

    public function next(): void
    {
        $this->current++;
    }

    public function key(): mixed
    {
        return $this->current;
    }

    public function current(): mixed
    {
        return $this->current ** 2;
    }
}
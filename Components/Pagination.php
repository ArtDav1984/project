<?php

class Pagination
{
    private $max = 8;
    private $total;
    private $notesOnPage;
    private $currentPage;
    private $path;

    public function __construct($total, $notesOnPage, $currentPage, $path)
    {
        $this->total = $total;
        $this->notesOnPage = $notesOnPage;
        $this->currentPage = $currentPage;
        $this->path = $path;
        $this->count = $this->countOfPages();
        $this->limit = $this->limit();
    }

    public function html()
    {
        $html = "";
        $links = "";
        for ($i = $this->limit[0]; $i <= $this->limit[1]; $i ++) {
            if($i == $this->currentPage){
                $links .=  "<a href='#' style='background-color: #FE980F; color: white' class='pag_link'>$i</a>";
            } else {
                $links .=  "<a href='{$this->path}{$i}' class='pag_link'>$i</a>";
            }
        }

        if($this->currentPage > 1) {
            $Page = $this->currentPage - 1;
            $html .= "<a href='{$this->path}{$Page}' class='pag_link'>&lt;</a>";
        }

        $html .= $links;

        if($this->currentPage < $this->count) {
            $Page = $this->currentPage + 1;
            $html .= "<a href='{$this->path}{$Page}' class='pag_link'>&gt;</a>";
        }

        if($this->count > 1) {
            return $html;
        }
    }

    private function limit()
    {
        $left = $this->currentPage - round($this->max / 2);

        $start = $left > 0 ? $left : 1;

        if ($start + $this->max <= $this->count)

            $end = $start > 1 ? $start + $this->max : $this->max;

        else {

            $end = $this->count;

            $start = $this->count - $this->max > 0 ? $this->count - $this->max : 1;
        }


        return array($start, $end);
    }

    private function countOfPages()
    {
        return ceil($this->total / $this->notesOnPage);
    }
}
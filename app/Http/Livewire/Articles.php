<?php

namespace App\Http\Livewire;

use App\Models\Articles as ModelsArticles;
use Livewire\Component;

class Articles extends Component
{
    public $count = 4;

    public function loadMore()
    {
        $this->count += 4;
        // sleep(1);
    }

    public function render()
    {
        $articles = ModelsArticles::take($this->count)->get();
        $articlesCount = ModelsArticles::count();
        return view('livewire.articles', [
            'articles' => $articles,
            'articlesCount' => $articlesCount,
        ]);
    }
}

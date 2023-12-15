<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PostForm extends Form
{
    #[Rule('required|min:3')]
    public $title;

    #[Rule('required|min:3')]
    public $content;

    public function save()
    {

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);


    }
}



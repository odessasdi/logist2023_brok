<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Post;
use Livewire\Attributes\Rule;


class Update extends Component
{
    public $post;
    public $formtitle = 'НОВАЯ ЗАПИСЬ';


    #[Rule('required')]
    public $title = '';

    #[Rule('required')]
    public $content = '';

    #[On('create')]
    public function create()
    {
        $this->openModal();
    }

    #[On('edit')]
    public function edit($id)
    {
        $this->formtitle = 'ИЗМЕНИТЬ ЗАПИСЬ';
        $this->post = post::findOrfail($id);
        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->openModal();
    }

    public function update()
    {
        $validated = $this->validate();
        $update = post::findOrFail($this->post->id);
        $update->update($validated);
        $this->closeModal();
    }



    public function save()
    {
        $this->validate();
    
        Post::create(
            $this->only(['title', 'content'])
        );
        $this->closeModal();
    }

    public function openModal()
    {
        $this->dispatch('open-modal', name:'modal'); 
    }

    public function closeModal()
    {
   
        $this->dispatch('close-modal', name:'modal'); 
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post.update');
    }
}

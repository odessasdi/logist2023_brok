<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use App\Livewire\Forms\PostForm;

class Posts extends Component
{
    use WithPagination;
    public $isOpen = false;
    public $postId;
    public PostForm $form;

    public function create()
    {
        $this->reset('form.title', 'form.content', 'postId');
        $this->openModal();
    }
    public function openModal()
    {
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate();
        $this->form->save();
        session()->flash('success', 'Post created successfully.');
        $this->reset('form.title', 'form.content');
        $this->closeModal();
    }

    public function edit($id)
    {
        $this->closeModal();
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->form->title = $post->title;
        $this->form->content = $post->content;
        $this->openModal();
    }

    public function update()
    {
        if ($this->postId) {

            $post = Post::findOrFail($this->postId);
            $this->validate();
            $post->update([
                'title' => $this->form->title,
                'content' => $this->form->content,
            ]);
            $this->postId = '';
            session()->flash('success', 'Post updated successfully.');
            $this->closeModal();
            $this->reset('form.title', 'form.content');
        }
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('success', 'Post deleted successfully.');
        $this->reset('form.title', 'form.content');
    }

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::paginate(20)
        ]);
    }
}
